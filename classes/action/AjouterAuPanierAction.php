<?php

namespace ccd\action;

use ccd\catalogue\Product;
use ccd\Panier\Panier;
use ccd\render\PanierRenderer;

class AjouterAuPanierAction extends Action
{
    public function execute(): string
    {
        $produit = Product::loadProduct();

        if (isset($_SESSION['email'])) {
            $panier = new Panier();
            $panier2 = $panier->getContenu();
            $panier->ajouterProduit($produit);
            $_SESSION['panier'] = $panier2;
            $renderer = new PanierRenderer($panier);

            return $renderer->render();
        } else {
            /*
            $panier = new \ccd\Panier\Panier();
            $panier->ajouterProduit($produit);
            $_SESSION['panier'] = $panier; */
        }

        return (new \ccd\render\RenderProduit($produit))->render();
    }
}








