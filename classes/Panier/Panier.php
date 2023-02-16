<?php

namespace ccd\Panier;

use ccd\catalogue\Product;

class Panier
{
    private array $produits = array();

    public function __construct()
    {
        if (isset($_SESSION['panier'])) {
            $this->produits = $_SESSION['panier'];
        }
    }

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

    public function getProduits()
    {
        return $this->produits;
    }

    public function getPrixTotal()
    {
        $prixTotal = 0;
        foreach ($this->produits as $produit) {
            $prixTotal += $produit['produit']->getPrix() * $produit['quantite'];
        }
        return $prixTotal;
    }

    public function getIndicateurCarbone()
    {
        $indicateurCarbone = 0;
        foreach ($this->produits as $produit) {
            $indicateurCarbone += $produit['produit']->getIndicateurCarbone() * $produit['quantite'];
        }
        return $indicateurCarbone;
    }
}

