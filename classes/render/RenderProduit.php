<?php

namespace ccd\render;

use ccd\catalogue\Product;

class RenderProduit implements Renderer
{
    private Product $produit;

    public function __construct($produit)
    {
        $this->produit = $produit;
    }

    public function render(): string
    {
        $html = <<<HTML
        <div class="produit" style="text-align: center">
            <div class="image">
                <img src="{$this->produit->getImage()}" alt="{$this->produit->getNom()}" width="30%" height="30%">
            </div>
            <div class="description">
                <h2>{$this->produit->getNom()}</h2>
                <p>{$this->produit->getDescription()}</p>
                <p>{$this->produit->getPrix()} €</p>
            </div>
        
        HTML;

        if (isset($_SESSION['email'])) {
            // Ajout du formulaire pour chaque produit
            $html .= '<form method="post" action="?action=ajouterAuPanier&produit=' . $this->produit->getId() . '">';
            $html .= '<label>Quantité/Poids :</label>';
            $html .= '<input type="number" name="quantity" value="1">';
            $html .= '<input type="submit" value="Ajouter au panier">';
            $html .= '</form>';
        }

        $html .= '</div>';

        return $html;
    }
}