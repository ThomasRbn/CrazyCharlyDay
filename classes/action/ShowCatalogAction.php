<?php

namespace ccd\action;
use ccd\catalogue\Catalogue;
use ccd\render\CatalogueRenderer;
use ccd\action\Action;

class ShowCatalogAction extends Action
{
    private Catalogue $catalogue;

    /**
     * @param Catalogue $catalogue
     * Constructeur paramétré
     */
    public function __construct(Catalogue $catalogue)
    {
        $this->catalogue = $catalogue;
        parent::__construct();
    }

    public function execute(): string
    {
        $renderer = new CatalogueRenderer($this->catalogue);

        $html = <<<END

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
<form method="post" action="?action=RechercheCatalog">
      <input name="recherche" type="text" placeholder="Recherche...">
      <button type="submit">Chercher</button>
    </form>
END;


        $html .= $renderer->render();

        return $html;
    }


}