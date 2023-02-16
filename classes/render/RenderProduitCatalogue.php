<?php

namespace ccd\render;

use ccd\catalogue\Product;
use ccd\db\ConnectionFactory;

class RenderProduitCatalogue implements Renderer
{
    private Product $produit;

    public function __construct($produit)
    {
        $this->produit = $produit;
    }

    public function render(): string
    {
        return <<<HTML
        <link rel="stylesheet" href="style.css">
        
        <div class="produit">
            <div class="image">
                <img src="{$this->produit->getImage()}" alt="{$this->produit->getNom()}">
            </div>
            <div class="description">
                <a href="?action=showProduct&produit={$this->produit->getId()}"><h3>{$this->produit->getNom()}</h3></a>
                <p>Prix : {$this->produit->getPrix()} €</p>
                <p>Lieu : {$this->produit->getLocalisation()}</p>
            </div>
        </div>
        HTML;
    }
}
{

}