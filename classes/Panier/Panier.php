<?php

namespace ccd\Panier;

use ccd\catalogue\Product;

class Panier
{
    private array $produits = array();

    public function ajouterProduit(Product $produit, $quantite = 1): void
    {
        if (!isset($this->produits[$produit->getId()])) {
            $this->produits[$produit->getId()] = array(
                'produit' => $produit,
                'quantite' => 0
            );
        }

        $this->produits[$produit->getId()]['quantite'] += $quantite;
    }

    public function supprimerProduit(Product $produit)
    {
        unset($this->produits[$produit->getId()]);
    }

    public function getContenu()
    {
        return $this->produits;
    }
}

