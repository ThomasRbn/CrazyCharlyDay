<?php

namespace ccd\Panier;

use ccd\catalogue\Product;
use ccd\db\ConnectionFactory;

class Panier
{
    private array $produits;

    public function __construct()
    {
       /* if (isset($_SESSION['panier'])) {
            $this->produits  = $_SESSION['panier']->getContenu();
        }
        else
        {
            $_SESSION['panier'] = $this->produits;
        } */
        $this->produits = array();
        $_SESSION['panier'] = $this->produits;
    }

    public function ajouterProduit(Product $produit, $quantite = 1): void
    {
        $db = ConnectionFactory::makeConnection();
        $stmt = $db->prepare("INSERT INTO panier (idProduit, email, quantite) VALUES (:id_produit, :id_user, :quantite)");
        $id = $produit->getId();
        $stmt->bindParam(':id_produit', $id);
        $stmt->bindParam(':quantite', $quantite);
        $stmt->bindParam(':id_user', $_SESSION['email']);
        $stmt->execute();
    }

    public function supprimerProduit(Product $produit)
    {
        $db = ConnectionFactory::makeConnection();
        $stmt = $db->prepare("DELETE FROM panier WHERE id_produit = :id_produit AND id_user = :id_user");
        $id = $produit->getId();
        $stmt->bindParam(':id_produit', $id);

        $stmt2 = $db->prepare("SELECT id FROM user WHERE email = :email");
        $stmt2->bindParam(':email', $_SESSION['email']);
        $stmt2->execute();
        $donnees = $stmt2->fetch();
        $id_user = $donnees['id'];

        $stmt->bindParam(':id_user', $id_user);
        $stmt->execute();
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

