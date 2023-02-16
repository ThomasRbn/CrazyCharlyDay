<?php

namespace ccd\dispatch;


use ccd\action\AjouterAuPanierAction;
use ccd\action\GestionCompteAction;
use ccd\action\LogoutAction;
use ccd\action\RegisterAction;
use ccd\action\ShowCatalogAction;
use ccd\action\ShowProductAction;
use ccd\action\SigninAction;
use ccd\catalogue\Catalogue;
use ccd\Panier\Panier;
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
        if (isset($_GET['action'])) {
            $action = match ($this->action) {
                'showProduct' => new ShowProductAction(),
                'show-catalog-action',
                'show-catalog-action&page=1',
                'show-catalog-action&page=2',
                'show-catalog-action&page=3' => new ShowCatalogAction(new Catalogue()),
                'addChoiceTriCatalogue' => $this->addChoiceTriCatalogue(),
                'signin' => new SigninAction(),
                'register' => new RegisterAction(),
                'logout' => new LogoutAction(),
                'gestionCompte' => new GestionCompteAction(),
                default => (isset($_SESSION['email'])) ? new DefaultAction() : new SigninAction(),
            };
        } else {
            $action = new ShowCatalogAction(new Catalogue());
        }


//            'signin' => new SigninAction(),
//            'register' => new RegisterAction(),
//            'logout' => new LogoutAction(),
//            'display-episode-details' => new DisplayEpisodeDetailsAction(),
//            'display-serie' => new DisplaySerieAction(),
//            'accueil-catalogue' => new AccueilCatalogueAction(),
//            'add-fav-series' => new AddFavSeriesAction(),
//            'user-home-page' => new UserHomePageAction(),

//            'update-episode-progress' => new UpdateEpisodeProgressAction(),
//            'delete-fav-series' => new DeleteFavSeriesAction(),
//            default => new DefaultAction(),


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