<?php

namespace ccd\action;

use ccd\catalogue\Catalogue;
use ccd\db\ConnectionFactory;

class AfficherPanierAction extends Action
{
    public function execute(): string
    {
        $db = ConnectionFactory::makeConnection();
        $stmt = $db->prepare("SELECT * FROM panier WHERE email = :email");
        $stmt->bindParam(':email', $_SESSION['email']);
        $stmt->execute();
        $donnees = $stmt->fetchAll();
        $panier = array();
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
        }
        $renderer = new \ccd\render\PanierRenderer($panier);
        return $renderer->render();
    }
}


