<?php

namespace ccd\render;
use ccd\products\Catalogue;
use ccd\exception\InvalidPropertyNameException;

class CatalogueRenderer implements Renderer
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

        foreach ($this->catalogue->__get("produits") as $produit) {
            $renderer = new RenderProduit($produit);
            $html .= $renderer->render();
        }
        $html .= '</div></div>';
        return $html;
    }
}