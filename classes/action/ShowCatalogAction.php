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

        $html = "";

        $page = htmlspecialchars($_SERVER['PHP_SELF'] . '?action=' . $_GET['action']);

        $html .= <<<END
                <p> Ca marche </p>
            END;
        $html .= $renderer->render();

        return $html;
    }


}