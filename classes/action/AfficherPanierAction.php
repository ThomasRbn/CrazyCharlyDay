<?php

namespace ccd\action;

use ccd\catalogue\Catalogue;

class AfficherPanierAction extends Action
{
    public function execute(): string
    {
        $catalogue = new Catalogue('mon catalogue');
        $panier = $catalogue->getPanier();
        $renderer = new \ccd\render\PanierRenderer($panier);
        return $renderer->render();
    }
}


