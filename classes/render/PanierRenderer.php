<?php

namespace ccd\render;

use ccd\db\ConnectionFactory;
use ccd\panier\Panier;

class PanierRenderer implements Renderer {

    private Panier $panier;

    public function __construct(Panier $panier) {
        $this->panier = $panier;
    }

    public function render(): string {




        $html = '<div id="panier-container">';
        $html .= '<div><label id="title">Mon panier</label></div>';
        // Affichage de la liste des produits du panier
        $html .= '<div id="panier">';
        foreach ($this->panier->getProduits() as $produit) {
            $html .= '<div class="produit">';
            $html .= '<div class="nom">' . $produit->getNom() . '</div>';
            $html .= '<div class="prix">' . $produit->getPrix() . ' €</div>';
            $html .= '</div>';
        }
        $html .= '</div>';

        // Affichage du prix total et de l'indicateur carbone
        $html .= '<div id="total">';
        $html .= '<div class="prix-total">Prix total : ' . $this->panier->getPrixTotal() . ' €</div>';
        $html .= '<div class="indicateur-carbone">Indicateur carbone : ' . $this->panier->getIndicateurCarbone() . '</div>';
        $html .= '</div>';

        $html .= '</div>';

        return $html;
    }
}