<?php

namespace ccd\catalogue;
use ccd\db\ConnectionFactory;
use ccd\catalogue\InvalidPropertyNameException;
use PDOStatement;

class Catalogue
{
    protected string $nom = "Liste des produits";

    protected array $produits;
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

}