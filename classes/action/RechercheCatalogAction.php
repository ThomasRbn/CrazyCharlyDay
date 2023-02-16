<?php

namespace ccd\action;
use ccd\catalogue\Catalogue;
use ccd\db\ConnectionFactory;


class RechercheCatalogAction extends Action
{


    public function __construct()
    {
        parent::__construct();
    }

    public function execute(): string
    {

        $connection = ConnectionFactory::makeConnection();
        $resultset = $connection->prepare("SELECT * FROM produit WHERE nom LIKE '%{$_POST['recherche']}%'");
        $resultset->execute();
        $html="";
        while ($row = $resultset->fetch()) {
            $html.= <<<END
<header>
  <img style="" src="img/logoCC.jpg" alt="logo" width="17%" height="10%">
  <nav>
    <ul>
      <li><a href="?action=ShowCatalogAction">Accueil</a> </li>
      <li><a href="?action=showUtilisateurList">Montrer la liste des utilisateurs</a></li>
      <li><a href="?action=afficherPanier">Panier</a> </li>
      <li><a href="?action=logout">Déconnexion</a></li>
    </ul>
  </nav>
</header> 
<div class="produit">

            <div class="description">
                <a href="?action=showProduit&produit={$row['id']}"><h3>{$row['nom']}</h3></a>
                <p>{$row['description']}</p>
            </div>
            <div class="image">
                <img src="img/{$row['id']}.jpg" alt="image">
            </div>
            <div class="prix">
                <p>{$row['prix']}€</p>
            </div>
        </div>
END;
        }
        $connection = null;
        return $html;

    }


}