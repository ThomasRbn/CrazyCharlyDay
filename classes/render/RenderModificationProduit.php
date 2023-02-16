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
</head >
<body >
 <div class=image>
                <img src={$produit->getImage()} alt={$produit->getNom()} width=30% height=30%>
            </div>
<form action=?action=showProduct&produit={$produit->getId()} method=post enctype=multipart/form-data>
    <label for=image>Modifier image :</label>
    <input type=file name=image id=image>
    <input type=submit value=Télécharger>
</form>

<form method = 'post' action=?action=showProduct&produit=".$produit->getId().">

<label for='nom' > Nom :</label >
<input type = 'text' name = 'nomV' id = 'nomV' value='{$produit->getNom()}' ><br >

<label for='categorie' >Categorie : </label >
<input type = 'text' name = 'categorieV' id = 'categorieV' value='{$produit->getCategorie()}' ><br >

<label for='prix' > Prix :</label >
<input type = 'text' name = 'prixV' id = 'prixV' value='{$produit->getPrix()}' ><br >

<label for='poids' > Poids :</label >
<input type = 'text' name = 'poidsV' id = 'poidsV' value='{$produit->getPoids()}' ><br >

<label for='description' > Description :</label >
<input type = 'text' name = 'descriptionV' id = 'descriptionV' value='{$produit->getDescription()}' ><br >
 
<label for='detail' > Detail :</label >
<input type = 'text' name = 'detailV' id = 'detailV' value='{$produit->getDetail()}' ><br >
 
 <label for='lieu' > Lieu :</label >
<input type = 'text' name = 'Lieu' id = 'Lieu' value='{$produit->getLieu()}' ><br >
 
 <label for='distance' > Distance :</label >
<input type = 'text' name = 'distanceV' id = 'distanceV' value='{$produit->getDistance()}' ><br >

<label for='latitude' > Latitude :</label >
<input type = 'text' name = 'latitudeV' id = 'latitudeV' value='{$produit->getLatitude()}' ><br >

<label for='longitude' > Longitude :</label >
<input type = 'text' name = 'longitudeV' id = 'longitudeV' value='{$produit->getLongitude()}' ><br >
 
<input type = 'submit' value = 'valider' >
</form >
</body >
</html >";
}
}