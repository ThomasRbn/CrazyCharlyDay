<?php

namespace ccd\action;
use ccd\catalogue\Catalogue;
use ccd\db\ConnectionFactory;


class ShowUtilisateursListAction extends Action
{

    /**
     * @param Catalogue $catalogue
     * Constructeur paramétré
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function execute(): string
    {
        if(($_SESSION["status"])!==0)header("Location: index.php");
        $connection = ConnectionFactory::makeConnection();
        $resultset = $connection->prepare("SELECT * FROM user");
        $resultset->execute();
        $html= <<<END
    <header>
      <img style="" src="img/logoCC.jpg" alt="logo" width="17%" height="10%">
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
    END;
        while ($row = $resultset->fetch()) {
            $html.= <<<END

<div class="utilisateurList">
            <div class="description">
                <a href="?action=showUtilisateur&utilisateur={$row['email']}"><h3>{$row['nom']}</h3></a>
            </div>
        </div>
END;
        }
        $connection = null;
        return $html;
    }


}