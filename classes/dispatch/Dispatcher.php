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
              'addChoiceTriCatalogue' =>  $this->addChoiceTriCatalogue(),
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