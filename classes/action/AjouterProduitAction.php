<?php

namespace ccd\action;

class AjouterProduitAction extends Action
{

    public function execute(): string
    {
        return "<html >
<head >
</head >
<body >
 <div class=image>
                <img src='' alt='' width=30% height=30%>
            </div>
<form action=?action=show-catalog-action method=post enctype=multipart/form-data>
    <label for=image>Ajouter image :</label>
    <input type=file name=image id=image>
    <input type=submit value=Télécharger>
</form>

<form method = 'post' action=?action=show-catalog-action>

<label for='id' > Id :</label >
<input type = 'text' name = 'IDV' id = 'IDV' value='' ><br >

<label for='nom' > Nom :</label >
<input type = 'text' name = 'nomV' id = 'nomV' value='' ><br >

<label for='categorie' >Categorie : </label >
<input type = 'text' name = 'categorieV' id = 'categorieV' value='' ><br >

<label for='prix' > Prix :</label >
<input type = 'text' name = 'prixV' id = 'prixV' value='' ><br >

<label for='poids' > Poids :</label >
<input type = 'text' name = 'poidsV' id = 'poidsV' value='' ><br >

<label for='description' > Description :</label >
<input type = 'text' name = 'descriptionV' id = 'descriptionV' value='' ><br >

<label for='detail' > Detail :</label >
<input type = 'text' name = 'detailV' id = 'detailV' value='' ><br >

 <label for='lieu' > Lieu :</label >
<input type = 'text' name = 'Lieu' id = 'Lieu' value='' ><br >

 <label for='distance' > Distance :</label >
<input type = 'text' name = 'distanceV' id = 'distanceV' value='' ><br >

<label for='latitude' > Latitude :</label >
<input type = 'text' name = 'latitudeV' id = 'latitudeV' value='' ><br >

<label for='longitude' > Longitude :</label >
<input type = 'text' name = 'longitudeV' id = 'longitudeV' value='' ><br >

<input type = 'submit' value = 'valider' >
</form >
</body >
</html >";
    }
}