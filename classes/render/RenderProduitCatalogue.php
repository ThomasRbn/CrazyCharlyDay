<?php

namespace ccd\render;

use ccd\catalogue\Product;

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
        <div class="produit">
            <div class="image">
                <img src="{$this->produit->getImage()}" alt="{$this->produit->getNom()}">
            </div>
            <div class="description">
                <h2>{$this->produit->getNom()}</h2>
                <p>Prix : {$this->produit->getPrix()} €</p>
                <p>Lieu : {$this->produit->getLocalisation()}</p>
            </div>
        </div>
        HTML;
    }
}
{

}