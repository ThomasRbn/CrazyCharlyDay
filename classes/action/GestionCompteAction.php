<?php

namespace ccd\action;

use ccD\db\ConnectionFactory;

/**
 * Class GestionCompteAction
 * Cette classe permet de gérer le compte de l'utilisateur
 */
class GestionCompteAction extends Action
{
    /**
     * Methode qui permet de gérer le compte de l'utilisateur
     * @return string Le html a rendre pour la page de gestion de compte
     */
    public function execute(): string
    {

        $html = '';
        // Connexion à la base de données
        $db = ConnectionFactory::makeConnection();
        // Recuperation des données de l'utilisateur
        $infoUser = $db->query("SELECT * from user where email = '{$_SESSION['email']}'");
        $infoUser = $infoUser->fetch();


        if ($this->http_method == 'GET'){ // GET : Affichage du formulaire
            return $this->getForm($infoUser);
        }else { // POST : Traitement du formulaire
            // Vérification si le bouton visant à modifié les information de l'utlisateur est appuyé
            if (isset($_POST['valider'])) {

                // Filtre les entrées
                $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
                $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

                // Vérification du mot de passe
                if (password_verify($password, $infoUser['password'])) {
                    // Mise à jour des données de l'utilisateur
                    $db->query("UPDATE user SET nom = '$nom', prenom = '$prenom', email = '$email' WHERE email = '{$_SESSION['email']}'");
                    $infoUser = $db->query("SELECT * from user where email = '{$_SESSION['email']}'");
                    $infoUser = $infoUser->fetch();

                    // Affichage d'un message de confirmation
                    $html .= $this->getForm($infoUser);
                    $html .= '<p>Vos informations ont bien été modifiées</p>';
                    $_SESSION['user'] = $infoUser['prenom'];
                    return $html;
                } else {
                    // Affichage d'un message d'erreur
                    $html .= $this->getForm($infoUser);
                    $html .= 'Mot de passe incorrect';
                    return $html;
                }
                // Vérification si le bouton visant à modifié les genres de l'utlisateur est appuyé
            }
        }
        return "";
    }

    private function getForm($infoUser): string{
        return  <<<END
        <header>
          <img style="" src="img/logoCC.jpg" alt="logo" width="17%" height="10%" >
          <nav>
            <ul>
              <li><a href="?action=ShowCatalogAction">Accueil</a> </li>
              <li><a href="?action=showUtilisateurList">Montrer la liste des utilisateurs</a></li>
              <li><a href="?action=gestionCompte">Gérer son compte</a> </li>
              <li><a href="?action=afficherPanier">Panier</a> </li>
              <li><a href="?action=logout">Déconnexion</a></li>
            </ul>
          </nav>
        </header> 
            <h3>Vous pouvez ici changer vos informations</h3>
            <div class="enteteAccueil">
            <form method="POST" action="?action=gestionCompte">
                <label for="nom">Nom</label><input type="text" name="nom" id="nom" value="{$infoUser['nom']}">
                
                <label for="prenom">Prenom</label><input type="text" name="prenom" id="prenom" value="{$infoUser['prenom']}" >
                
                <label for="email">Email</label><input type="email" name="email" id="email" value="{$infoUser['email']}">
                
                <label for="mdp">Mot de passe</label><input type="password" name="password" id="password">
                <input type="submit" value="Valider" name="valider">
            </form>
            
            
            </div>
        END;

    }

}