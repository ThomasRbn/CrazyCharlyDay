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
        if (isset($_SESSION['email']) && isset($_SESSION['panier'])) {
            $panier = $_SESSION['panier'];
            $panier->ajouterProduit($produit);
            $_SESSION['panier'] = $panier;

        } else {
            $panier = new Panier();
            $panier->ajouterProduit($produit);
            $_SESSION['panier'] = $panier;
        }
        var_dump($_SESSION['panier']);
        return <<<HTML
<!--        <head>-->
<!--            <meta http-equiv="refresh" content="0;URL=index.php?action=show-catalog-action">-->
<!--        </head>-->
        <script>alert("Produit ajouté au panier")</script>
HTML;

    }
}








