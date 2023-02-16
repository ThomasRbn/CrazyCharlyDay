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
       /* $html = '<div id="catalog-container">';
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
        return $html; */

        // Récupération du numéro de page à afficher
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

        // Nombre de produits à afficher par page
        $produits_par_page = 5;

        // Calcul de l'indice de départ et de fin pour la page courante
        $debut = ($page - 1) * $produits_par_page;
        $fin = $debut + $produits_par_page;

        try {
            $nom = $this->catalogue->__get("nom");
        } catch (InvalidPropertyNameException $e) {
            $nom = "CATALOG";
        }

        $html = '<div id="catalog-container">';
        $html .= '<div><label id="title">' . $nom . '</label></div>';
        $html .= '<div id="catalog">';

        $produits = $this->catalogue->__get("produits");


        // Affichage de la liste des produits pour la page courante
        for ($i = $debut; $i < $fin && $i < count($produits); $i++) {
            $produit = $produits[$i];
            $renderer = new RenderProduit($produit);
            $html .= $renderer->render();

        }

        // Affichage des liens de pagination
        $html .= '<div class="pagination">';
        $nb_pages = ceil(count($produits) / $produits_par_page);
        for ($i = 1; $i <= $nb_pages; $i++) {
            $active = $i == $page ? ' active' : '';
            $html .= '<a class="page' . $active . '" href="?action=show-catalog-action&page=' . $i . '">' . $i . '</a>';
        }
        $html .= '</div>';

        return $html;
    }
}