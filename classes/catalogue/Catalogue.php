<?php

namespace ccd\catalogue;
use ccd\db\ConnectionFactory;
use ccd\catalogue\InvalidPropertyNameException;
use ccd\filtre\Tri;
use ccd\filtre\TriCategorie;
use ccd\filtre\TriLieu;
use PDOStatement;

class Catalogue
{
    protected string $nom = "Liste des produits";

    protected array $produits;

    protected array $panier;

    /**
     * Consructeur par défaut
     */
    public function __construct()
    {
        $this->produits = $this->getProduits();
    }

    protected function getProduits(): array
    {
        $connection = ConnectionFactory::makeConnection();
        $resultset = $connection->prepare("SELECT * FROM produit");
        $resultset->execute();
        $connection = null;

        $this->produits = $this->retrieveProduitList($resultset);

//        if (isset($this->filtre)) {
//            return $this->filtre->filtrer($this->produits);
//        }

        return $this->produits;
    }

    protected function retrieveProduitList(PDOStatement $resultSet): array
    {
        $produits = [];
        while ($row = $resultSet->fetch()) {
            $produits[] = new Product($row['id'], $row['categorie'], $row['nom'], $row['prix'], $row['poids'], $row['description'], $row['detail'], $row['lieu'], $row['distance'], $row['latitude'], $row['longitude'], 0);
        }
        return $produits;
    }

    /**
     * @param $attname
     * @return mixed
     * @throws InvalidPropertyNameException
     * Getter
     */
    public function __get($attname)
    {
        if (property_exists($this, $attname)) return $this->$attname;
       // throw new InvalidPropertyNameException();
    }

    public function ajouterAuPanier(int $idProduit, float $quantite): void
    {
        if (array_key_exists($idProduit, $this->panier)) {
            // Le produit est déjà dans le panier, on ajoute la quantité demandée à la quantité existante
            $this->panier[$idProduit] += $quantite;
        } else {
            // Le produit n'est pas encore dans le panier, on l'ajoute avec la quantité demandée
            $this->panier[$idProduit] = $quantite;
        }
    }

    public function definirTri(int $typeTri)
    {
        switch ($typeTri) {
            case Tri::FILTRE_CATEGORIE:
                $tri = new TriCategorie();
                break;
            case Tri::FILTRE_LIEU:
                $tri = new TriLieu();
                break;
            default:
                throw new \Exception("Type de tri non reconnu.");
        }

        $this->produits = $tri->filtrer($this->produits);
    }

    public function getPanier()
    {
        return $this->panier;
    }

}