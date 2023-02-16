<?php

namespace ccd\action;

use ccd\catalogue\Product;

class AjouterAuPanierAction extends Action
{
    public function execute(): string
    {
        $produit = Product::loadProduct();

        if (isset($_SESSION['email'])) {
            $panier = $_SESSION['panier'];
            $panier->ajouterProduit($produit);
            $_SESSION['panier'] = $panier;
        } else {
            $panier = new \ccd\Panier\Panier();
            $panier->ajouterProduit($produit);
            $_SESSION['panier'] = $panier;
        }

        return (new \ccd\render\RenderProduit($produit))->render();
    }
}








