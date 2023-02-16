<?php

namespace ccd\action;

use ccd\catalogue\Product;
use ccd\db\ConnectionFactory;

class ShowUtilisateurAction extends Action
{

    public function execute(): string
    {
        if(($_SESSION["status"])!==0)header("Location: index.php");
        $html = "";
        $email = $_GET['utilisateur'];
        $db = ConnectionFactory::makeConnection();
        $stmt = $db->prepare('SELECT * FROM user WHERE email = ?');
        $stmt->bindParam(1, $email);
        $stmt->execute();
            $row = $stmt->fetch();

        if (isset($_POST['validerModifUser'])) {
            $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
            $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $status = filter_input(INPUT_POST, 'status');
            ($status == "on")?$status=0:$status=100;
            // Vérification du mot de passe
            // Mise à jour des données de l'utilisateur
            $db->query("UPDATE user SET nom = '$nom', prenom = '$prenom', email = '$email', status = $status WHERE email = '{$row['email']}'");
            $infoUser = $db->query("SELECT * from user where email = '{$email}'");
            $infoUser = $infoUser->fetch();

            // Affichage d'un message de confirmation
            $html = $this->getForm($infoUser);
            $html .= '<p>Les informations ont bien été modifiées</p>';
            $_SESSION['user'] = $infoUser['prenom'];
            return $html;
        }
        $html = $this->getForm($row);

        return $html;
    }

    private function getForm($row): string{
        ($row['status']==0)?$admin="oui":$admin="non";
        return <<<END
<div class="utilisateur">
            <div class="description">
                <h2>email: {$row['email']}</h2>
                <p>nom: {$row['nom']}</p>
                <p>prenom: {$row['prenom']}</p>
                <p>admin: {$admin}</p>
                <form method="post" action="?action=changeUtilisateur&utilisateur={$row['email']}">
                        <button type="submit" value="modifierUser" name="modifierUser"> Modifier </button>
                </form>
            </div>
        </div>
END;
    }
}
/*
 * <form method="post" action="?action=register">
                        <label> Email :  <input type="email" name="email" placeholder="<email>"> </label>
                        <label> Mot de passe :  <input type="password" name="password" placeholder = "<mot de passe>"> </label>
                        <label> Confirmer le mot de passe :  <input type="password" name="password2" placeholder = "<mot de passe>"> </label>
                        <label> Nom : <input type="text" name="nom" placeholder="<nom>"> </label>
                        <label> Prénom : <input type="text" name="prenom" placeholder="<prenom>"> </label>
                        <button type="submit" value="validerRegister" name="validerRegister"> S'enregistrer </button>
                     <div>
                        <label>Vous avez déjà un compte ?</label>
                        <a href="?action=signin">Se connecter</a>
                    </div>
                </form>
 */