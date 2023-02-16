<?php

namespace ccd\action;
use ccd\catalogue\Catalogue;
use ccd\render\RenderCatalogue;

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
        $renderer = new RenderCatalogue($this->catalogue);

        $html = "";

        $page = htmlspecialchars($_SERVER['PHP_SELF'] . '?action=' . $_GET['action']);

        $html .= $renderer->render();

        return $html;
    }


}