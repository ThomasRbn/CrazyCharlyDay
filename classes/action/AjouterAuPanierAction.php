<?php

namespace ccd\action;

use ccd\catalogue\Product;

class AjouterAuPanierAction extends Action
{
    public function execute(): string
    {
        $produit = Product::loadProduct();
        return (new \ccd\render\RenderProduit($produit))->render();
    }
}








