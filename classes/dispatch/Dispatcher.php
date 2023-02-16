<?php

namespace ccd\dispatch;


use ccd\action\ShowCatalogAction;
use ccd\action\ShowProductAction;
use ccd\catalogue\Catalogue;
use Exception;

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

            'signin' => new SigninAction(),
            'register' => new RegisterAction(),
            'logout' => new LogoutAction(),

            'gestion-utilisateur' => new GestionUtilisateurAction(),

            'modifierProduit' => new MiseAJourDescriptionAction(),
            default => new ShowCatalogAction(new Catalogue()),
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