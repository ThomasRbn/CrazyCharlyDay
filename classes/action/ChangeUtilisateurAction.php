<?php

namespace ccd\action;

use ccd\catalogue\Product;
use ccd\db\ConnectionFactory;

class ChangeUtilisateurAction extends Action
{

    public function execute(): string
    {
        if(($_SESSION["status"])!==0)header("Location: index.php");

        $db = ConnectionFactory::makeConnection();
        $email = $_GET['utilisateur'];
        $stmt = $db->prepare('SELECT * FROM user WHERE email = ?');
        $stmt->bindParam(1, $email);
        $stmt->execute();
        $infoUser = $stmt->fetch();


        if (isset($_POST['modifierUser'])) { // GET : Affichage du formulaire
            ($infoUser['status']==0)? $admin = '<input type="checkbox" id="status" name="status" checked>': $admin = '<input type="checkbox" id="status" name="status" >';
            return $this->getForm($infoUser,$admin);
        } else { // POST : Traitement du formulaire
            // Vérification si le bouton visant à modifié les information de l'utlisateur est appuyé

                // Filtre les entrées


                // Vérification si le bouton visant à modifié les genres de l'utlisateur est appuyé
            }
        return "";
        }

    private function getForm($row,$admin): string{
            return <<<END
<div class="utilisateur">
            <div class="description">
            <form method="POST" action="?action=showUtilisateur&utilisateur={$row['email']}">
                
                <label for="email">Email</label><input type="email" name="email" id="email" value="{$row['email']}">
                <label for="nom">Nom</label><input type="text" name="nom" id="nom" value="{$row['nom']}">
                <label for="prenom">Prenom</label><input type="text" name="prenom" id="prenom" value="{$row['prenom']}" >
                <label for="status">Status: </label>$admin
                <input type="submit" value="Valider" name="validerModifUser">
            </div>
        </div>
END;

//                <label for="status">Status</label><input type="text" name="status" id="status" value="{$row['status']}" >
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