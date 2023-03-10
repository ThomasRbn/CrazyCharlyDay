<?php

namespace ccd\action;

use ccd\auth\Authentification;
use iutnc\NetVOD\auth\Auth;
use iutnc\NetVOD\Redirect\Redirection;

/**
 * Class InscriptionAction
 * Cette classe permet de gérer l'inscription d'un utilisateur
 */
class RegisterAction extends Action
{
    /**
     * methode qui enregistre un nouveau utilisateur une fois qu'il a rempli un formulaire
     * @return string
     */
    public function execute() : string
    {
        if (!isset($_POST['validerRegister'])) {
//            if ($this->http_method === 'GET') {
            //recupere le formulaire
            return $this->getForm();
        } else { // POST
            try {
                // Filtre les entrées
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
                $password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_STRING);
                $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
                $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
                //envoy les données a AUth pour enregistement puis redirige ou donne un erreur
                Authentification::register($email, $password, $password2, $nom, $prenom);
                header("Location: index.php");
            } catch (\iutnc\NetVOD\AuthException\AuthException $e) {
                $html = $this->getForm();
                $html .= "<h4>erreur lors de la création du compte : {$e->getMessage()}";
            }

            return $html;
        }
    }


    /**
     * methode qui donne un formulaire pour s'inscrire
     * @return string
     */
    private function getForm(): string
    {
        return <<<END
                <div class="enteteAccueil">
                    <label>S'inscrire</label>
                <form method="post" action="?action=register">
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
                </div>
            END;
    }
}