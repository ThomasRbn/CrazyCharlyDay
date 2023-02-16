<?php

namespace ccd\action;

use \ccd\auth\Authentification;
use ccd\AuthException\AuthException;
//use cdd\Redirect\Redirection;

/**
 * Class AccueilUtilisateurAction
 */
class SigninAction extends Action
{
    /**
     * Méthode qui permet de connecter l'utilisateur
     * @return string Html
     */
    public function execute(): string
    {
        $html = '';
        if (!isset($_POST['validerConnexion'])) {
//        if ($this->http_method === 'GET') { // Si la méthode est GET alors on affiche le formulaire de connexion
//            echo "ici";
            $html .= $this->getForm();
        } else { // POST Traitement du formulaire
            try {
                // Vérification que les champs sont bien remplis
                if (!(isset($_POST['email']) && isset($_POST['password']))) {
                    throw new AuthException("Erreur : email ou mot de passe non renseigné");
                }
                // Filtre les entrées
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

                // L'utilisateur se connecte
                $res = Authentification::authenticate($email, $password);

                // Si l'utilisateur est connecté, redirection vers la page d'accueil, sinon affichage d'un message d'erreur
                if ($res) {
                    header("Location: index.php");
                } else {
                    throw new AuthException("Erreur : email ou mot de passe incorrect");
                }

            } catch (\iutnc\NetVOD\AuthException\AuthException $e) {
                $html .= $this->getForm();
                $html .= "<h4> échec authentification : {$e->getMessage()}</h4>";
            }
        }
        return $html;
    }

    private function getForm(): string
    {
        return <<<END
                <div class="enteteAccueil">
                <img src="./img/logoCC.jpg" width="50%" height="50%" >
                <form method="post" action="?action=signin">
                        <label> Email :  <br><input type="email" name="email" placeholder="<email>"> </label>
                        <label> Mot de passe :  <br><input type="password" name="password" placeholder = "<mot de passe>"> </label>
                        
                        <button type="submit" value="validerConnexion" name="validerConnexion"> Connexion </button>
                        <div>
                            <label>Pas de compte ?</label>
                            <a href="?action=register">Créer Un Compte</a>
                        </div>
                </form>
                </div>

            END;
    }
}