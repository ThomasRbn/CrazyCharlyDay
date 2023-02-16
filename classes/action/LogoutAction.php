<?php

namespace ccd\action;


/**
 * Class AccueilUtilisateurAction
 */
class LogoutAction extends Action
{

    /**
     * Méthode qui permet de se déconnecter de se rediriger vers la page d'accueil
     * @return string Aucune donnée
     */
    public function execute(): string
    {
        session_destroy();
        unset($_SESSION['email']);
        header("Location: index.php");
        echo "ici";
        die();
        return '';
    }
}