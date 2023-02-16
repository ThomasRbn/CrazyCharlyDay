<?php

namespace ccd\render;

use ccd\catalogue\Catalogue;
use ccd\exception\InvalidPropertyNameException;

class RenderCatalogue implements Renderer
{

    private Catalogue $catalogue;

    public function __construct(Catalogue $catalogue)
    {
        $this->catalogue = $catalogue;
    }

    public function render(): string
    {
        $html = '<div id="catalog-container">';
        try {
            $nom = $this->catalogue->__get("nom");
        } catch (InvalidPropertyNameException $e) {
            $nom = "CATALOG";
        }
        $html .= '<div><label id="title">' . $nom . '</label></div>';
        $html .= '<div id="catalog">';

        $id = 1;
        foreach ($this->catalogue->__get("produits") as $produit) {
            $html .= <<<HTML
            <div class="produit">
                <div class="image">
                    <img width = 20% height = 20% src="{$produit->getImage()}" alt="{$produit->getNom()}">
                </div>
                <div class="description">
                    <a href="?action=showProduct&produit={$id}"><h2>{$produit->getNom()}</h2></a>
                </div>
            </div>
            HTML;
            $id++;
        }
        $html .= '</div></div>';
        return $html;
    }
}