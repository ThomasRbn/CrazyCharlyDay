<?php

namespace ccd\action\ModificationProduit;

use ccd\action\Action;
use ccd\db\ConnectionFactory;
use ccd\catalogue\Product;
class MiseAJourProduitAction extends Action
{
    private Product $produit;
function __construct()
{
    $this->produit=Product::loadProduct();
}

    public function execute(): string
    {
        $reponse = "modification non effectué";
        $connection = ConnectionFactory::makeConnection();
        $stat = $connection->exec('select status from user where email=$_SESSION["email"]');
        if ($stat == 0) {
            foreach ($_POST["modificationProduit"] as $item=>$value)
            $this->produit->setParam($_POST["modification"][$item],$value);
            $reponse = 'modification effectué';
        }
        return $reponse;
    }
}