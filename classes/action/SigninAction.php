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
                    echo '<script>alert("Veuillez remplir tous les champs")</script>';
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
                    echo <<<END
                   <head>
                        <meta http-equiv="refresh" content="0;URL=index.php">
                   </head>
                    <script>alert("Email ou mot de passe incorrect")</script>';
                END;


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
            <body id="accueil">
                <div class="enteteAccueil">
                <img src="./img/logoCC.jpg" width="50%" height="50%" >
                <form method="post" action="?action=signin" id="formInscr">
                        <label style="font-size: 1.25em; grid-column: 1; grid-row: 1"> Email :</label>
                        <input style="grid-column: 2; grid-row: 1" type="email" name="email" placeholder="Email">
                        <label style="grid-column: 1; grid-row: 2">Mot de passe :</label>
                        <input style="grid-column: 2; grid-row: 2" type="password" name="password" placeholder = "Mot de passe">
                        <button style="grid-column: span 2; grid-row: 3" type="submit" value="validerConnexion" name="validerConnexion">Connexion</button>
                        <a style="grid-column: span 2; grid-row: 4" href="?action=register">Créer Un Compte</a>
                </form>
                </div>
            </body>
            END;
    }
}