<?php

namespace ccd\render;

class PanierRenderer implements Renderer
{
    public function render(): string
    {
        return <<<HTML
        <div class="panier">
            <h2>Votre panier</h2>
            <div class="produits">
                <div class="produit">
                    <div class="image">
                        <img src="" alt="Produit 1">
                    </div>
                    <div class="description">
                        <h2>Produit 1</h2>
                        <p>Produit 1</p>
                        <p>10 €</p>
                    </div>
                </div>
                <div class="produit">
                    <div class="image">
                        <img src="" alt="Produit 2">
                    </div>
                    <div class="description">
                        <h2>Produit 2</h2>
                        <p>Produit 2</p>
                        <p>20 €</p>
                    </div>
                </div>
            </div>
            <div class="total">
                <p>Total : 30 €</p>
            </div>
        </div>
        HTML;
    }
}