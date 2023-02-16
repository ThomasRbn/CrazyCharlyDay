<?php

namespace ccd\action;

use ccd\catalogue\Product;
use ccd\db\ConnectionFactory;
use ccd\render\RenderModificationProduit;

class MiseAJourProduitAction extends Action
{
    private Product $produit;
function __construct()
{
    $this->produit=Product::loadProduct();
    $this->produit->updateProduit();
}

    public function execute(): string
    {
        $render=new RenderModificationProduit();
        $return="vous avez pas le droit d'etre là";
        if($_SESSION['status']==0) {
        /*    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Récupérer les données du formulaire
                $tableauAAjouter = array(
                    $_POST['Image'] => $_POST['ImageV'],
                    $_POST['nom'] => $_POST['nomV'],
                    $_POST['categorie'] => $_POST['categorieV'],
                    $_POST['prix'] => $_POST['prixV'],
                    $_POST['poids'] => $_POST['poidsV'],
                    $_POST['description'] => $_POST['descriptionV'],
                    $_POST['detail'] => $_POST['detailV'],
                    $_POST['lieu'] => $_POST['lieuV'],
                    $_POST['distance'] => $_POST['distanceV'],
                    $_POST['latitude'] => $_POST['latitudeV'],
                    $_POST['longitude'] => $_POST['longitudeV'],
                );
                $_POST = array_merge($_POST, $tableauAAjouter);
            }*/
            $reponse=$render->render() ;
        }
        return $reponse;
    }
}