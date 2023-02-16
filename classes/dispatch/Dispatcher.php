<?php

namespace ccd\dispatch;


use ccd\action\AjouterAuPanierAction;
use ccd\action\AjouterProduitAction;
use ccd\action\GestionCompteAction;
use ccd\action\LogoutAction;
use ccd\action\RechercheCatalogAction;
use ccd\action\MiseAJourProduitAction;
use ccd\action\ModificationProduit\MiseAJourDescriptionAction;
use ccd\action\RegisterAction;
use ccd\action\ShowCatalogAction;
use ccd\action\ShowProductAction;
use ccd\action\ShowUtilisateursListAction;
use ccd\action\ShowUtilisateurAction;
use ccd\action\ChangeUtilisateurAction;
use ccd\action\SigninAction;
use ccd\action\AfficherPanierAction;
use ccd\catalogue\Catalogue;
use ccd\Panier\Panier;
use ccd\render\PanierRenderer;
use Exception;

class Dispatcher
{
    public ?string $action;

    public function __construct()
    {
        $this->action = $_GET['action'] ?? null;
    }

    public function addChoiceTriCatalogue()
    {
        if (isset ($_POST['choixTri'])) {
            $tri = intval($_POST['choixTri']);
            //$catalog = $user->getCatalogue();
            $catalog = new Catalogue();
            $catalog->definirTri($tri);
            $action = new ShowCatalogAction($catalog);
        } else {
            // $this->renderPage($errorMessage);
            return;
        }
        return $action;
    }

    public function run(): void
    {
        $action = match ($this->action) {
            'showProduct' => new ShowProductAction(),
            'show-catalog-action' => new ShowCatalogAction(new Catalogue()),
            'addChoiceTriCatalogue' => $this->addChoiceTriCatalogue(),
            'ajouterAuPanier' => new AjouterAuPanierAction(),
            'afficherPanier' => new AfficherPanierAction(),
            'signin' => new SigninAction(),
            'register' => new RegisterAction(),
            'logout' => new LogoutAction(),
            'gestionCompte' => new GestionCompteAction(),
            'showUtilisateurList' => new ShowUtilisateursListAction(),
            'showUtilisateur' => new ShowUtilisateurAction(),
            'changeUtilisateur' => new ChangeUtilisateurAction(),
            'ajouter-produit' => new AjouterProduitAction(),
            default => (isset($_SESSION['email'])) ? new ShowCatalogAction(new Catalogue()) : new SigninAction(),
        };
        try {
            $this->renderPage($action->execute());
        } catch (Exception $e) {
            $this->renderPage($e->getMessage());
        }
    }

    /**
     * Method that return string corresponding to the main content to show to user
     * @param string $html
     * @return void
     */
    private function renderPage(string $html): void
    {
        echo $html;
    }

}