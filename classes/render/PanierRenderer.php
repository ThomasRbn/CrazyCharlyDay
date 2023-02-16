<?php

namespace ccd\render;

use ccd\db\ConnectionFactory;
use ccd\panier\Panier;

class PanierRenderer implements Renderer {

    private array $panier;

    public function __construct(array $panier) {
        $this->panier = $panier;
    }

    public function render(): string {
    $db = ConnectionFactory::makeConnection();
    $stmt = $db->prepare("SELECT * FROM panier WHERE email = :email");
    $stmt->bindParam(':email', $_SESSION['email']);
    $stmt->execute();
    $donnees = $stmt->fetchAll();
    $panier = array();
    $html = "";
    foreach ($donnees as $produit) {
        $stmt2 = $db->prepare("SELECT * FROM produit WHERE id = :id");
        $stmt2->bindParam(':id', $produit['idProduit']);
        $stmt2->execute();
        $donnees2 = $stmt2->fetch();
        $produit = array(
            'id' => $donnees2['id'],
            'nom' => $donnees2['nom'],
            'prix' => $donnees2['prix'],
            'quantite' => $produit['quantite']
        );
        $panier[] = $produit;

        $html .= $produit['nom'] . " " . $produit['prix'] . "€ " . $produit['quantite'] . "x <br>";
    }
        return $html;
    }
}