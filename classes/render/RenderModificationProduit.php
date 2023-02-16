<?php

namespace ccd\render;

use ccd\catalogue\Product;

class RenderModificationProduit implements Renderer
{
    public function render(): string
    {
        $produit=Product::loadProduct();

        return "<html >
<head >
<title > Formulaire pour ajouter un tableau à la superglobale $_POST en PHP </title >
</head >
<body >
<h1 > Ajouter un tableau à la superglobale $_POST en PHP </h1 >
<form method = 'post' >

<label for='Image' > Image :</label >
<input type = 'text' name = 'Image' id = 'Image' value='{$produit->getImage()}' ><br >

<label for='nom' > Nom :</label >
<input type = 'text' name = 'nom' id = 'nom' value='{$produit->getNom()}' ><br >

<label for='categorie' >Categorie : </label >
<input type = 'text' name = 'categorie' id = 'categorie' value='{$produit->getCategorie()}' ><br >

<label for='prix' > Prix :</label >
<input type = 'text' name = 'prix' id = 'prix' value='{$produit->getPrix()}' ><br >

<label for='poids' > Poids :</label >
<input type = 'text' name = 'poids' id = 'poids' value='{$produit->getPoids()}' ><br >

<label for='description' > Description :</label >
<input type = 'text' name = 'description' id = 'description' value='{$produit->getDescription()}' ><br >
 
<label for='detail' > Detail :</label >
<input type = 'text' name = 'detail' id = 'detail' value='{$produit->getDetail()}' ><br >
 
 <label for='lieu' > Lieu :</label >
<input type = 'text' name = 'distance' id = 'distance' value='{$produit->getLieu()}' ><br >
 
 <label for='distance' > Description :</label >
<input type = 'text' name = 'distance' id = 'distance' value='{$produit->getDistance()}' ><br >

<label for='latitude' > Latitude :</label >
<input type = 'text' name = 'latitude' id = 'latitude' value='{$produit->getLatitude()}' ><br >

<label for='longitude' > Longitude :</label >
<input type = 'text' name = 'longitude' id = 'longitude' value='{$produit->getLongitude()}' ><br >
 
<input type = "submit" value = "Ajouter le tableau à la superglobale $_POST" >
</form >
</body >
</html >"
}
}