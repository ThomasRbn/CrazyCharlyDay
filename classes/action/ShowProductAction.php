<?php

namespace ccd\action;

use ccd\catalogue\Product;

class ShowProductAction extends Action
{

    public function execute(): string
    {
//echo var_dump($_POST);
        $produit=null;
        if(isset($_POST['categorieV'])){
            $produit=new Product($_GET['produit'],$_POST["categorieV"],$_POST["nomV"],$_POST["prixV"],$_POST["poidsV"],$_POST["descriptionV"],$_POST["detailV"],$_POST["Lieu"],$_POST["distanceV"],$_POST["latitudeV"],$_POST["longitudeV"]);
            $produit->updateProduit();
        }else{
            $produit = Product::loadProduct();
        }
        return (new \ccd\render\RenderProduit($produit))->render();
    }
}