<?php

namespace ccd\dispatch;


use ccd\action\AjouterAuPanierAction;
use ccd\action\ShowCatalogAction;
use ccd\Panier\Panier;
use ccd\Catalogue\Catalogue;
use Exception;
use ccd\action\ShowProductAction;

class Dispatcher
{
    public ?string $action;

    public function __construct()
    {
        $this->action = $_GET['action'] ?? null;
    }

    public function run(): void
    {
        $action = match ($this->action) {
            'showProduct' => new ShowProductAction(),
              'show-catalog-action' => new ShowCatalogAction(new Catalogue()),
              'show-catalog-action&page=1' => new ShowCatalogAction(new Catalogue()),
              'show-catalog-action&page=2' => new ShowCatalogAction(new Catalogue()),
              'show-catalog-action&page=3' => new ShowCatalogAction(new Catalogue()),
//            'signin' => new SigninAction(),
//            'register' => new RegisterAction(),
//            'logout' => new LogoutAction(),
              'ajouter-au-panier-action' => new AjouterAuPanierAction(new Panier()),
//            'display-serie' => new DisplaySerieAction(),
//            'accueil-catalogue' => new AccueilCatalogueAction(),
//            'add-fav-series' => new AddFavSeriesAction(),
//            'user-home-page' => new UserHomePageAction(),
//            'gestion-utilisateur' => new GestionUtilisateurAction(),
//            'update-episode-progress' => new UpdateEpisodeProgressAction(),
//            'delete-fav-series' => new DeleteFavSeriesAction(),
//            default => new DefaultAction(),
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