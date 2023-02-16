<?php

namespace ccd\catalogue;

use ccd\db\ConnectionFactory;

class Product
{

    private string $id;
    private string $categorie;
    private string $nom;
    private string $prix;
    private string $poids;
    private string $description;
    private string $detail;
    private string $lieu;
    private string $distance;
    private string $latitude;
    private string $longitude;

    public function __construct($id, $categorie, $nom, $prix, $poids, $description, $detail, $lieu, $distance, $latitude, $longitude)
    {
        $this->id = $id;
        $this->categorie = $categorie;
        $this->nom = $nom;
        $this->prix = $prix;
        $this->poids = $poids;
        $this->description = $description;
        $this->detail = $detail;
        $this->lieu = $lieu;
        $this->distance = $distance;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public static function displayProduit(): ?string
    {
        $idproduit = $_GET['produit'];
        $db = ConnectionFactory::makeConnection();

        $stmt = $db->prepare('SELECT * FROM produit WHERE id = ?');
        $stmt->bindParam(1, $idproduit);

        if ($stmt->execute()) {
            while ($donneesProduit = $stmt->fetch()) {
                $id = $donneesProduit['id'];
                $categorie = $donneesProduit['categorie'];
                $nom = $donneesProduit['nom'];
                $prix = $donneesProduit['prix'];
                $poids = $donneesProduit['poids'];
                $description = $donneesProduit['description'];
                $detail = $donneesProduit['detail'];
                $lieu = $donneesProduit['lieu'];
                $distance = $donneesProduit['distance'];
                $latitude = $donneesProduit['latitude'];
                $longitude = $donneesProduit['longitude'];
                $produit = '<div class="produit">
                                <div class="produit__image">
                                    <img src="img/produits/' . $id . '.jpg" alt="Image du produit">
                                </div>
                                <div class="produit__description">
                                    <h2 class="produit_nom">' . $nom . '</h2>
                                    <p class="produit_categorie">' . $categorie . '</p>
                                    <p class="produit_prix">' . $prix . ' €</p>
                                    <p class="produit_poids">' . $poids . ' kg</p>
                                    <p class="produit_description">' . $description . '</p>
                                    <p class="produit_detail">' . $detail . '</p>
                                    <p class="produit_lieu">' . $lieu . '</p>
                                    <p class="produit_distance">' . $distance . ' km</p>
                                    <p class="produit_latitude">' . $latitude . '</p>
                                    <p class="produit_longitude">' . $longitude . '</p>
                                </div>
                            </div>';
                return $produit;
            }
        }
        return null;
    }

    public static function loadProduct(): ?Product {
        $idproduit = $_GET['produit'];
        $db = ConnectionFactory::makeConnection();
        $stmt = $db->prepare('SELECT * FROM produit WHERE id = ?');
        $stmt->bindParam(1, $idproduit);
        if ($stmt->execute()) {
            $donnees = $stmt->fetch();
            $id = $donnees['id'];
            $categorie = $donnees['categorie'];
            $nom = $donnees['nom'];
            $prix = $donnees['prix'];
            $poids = $donnees['poids'];
            $description = $donnees['description'];
            $detail = $donnees['detail'];
            $lieu = $donnees['lieu'];
            $distance = $donnees['distance'];
            $latitude = $donnees['latitude'];
            $longitude = $donnees['longitude'];
            $produit = new Product($id, $categorie, $nom, $prix, $poids, $description, $detail, $lieu, $distance, $latitude, $longitude);
            return $produit;
        }
        return null;
    }

    // getter magique
    public function __get($name)
    {
        $method = 'get' . ucfirst($name);
        $this->$name = $this->$method();
        return $this->$name;
    }

    public function getImage(){
        return 'img/' . $this->id . '.jpg';
    }

    public function getNom(){
        return $this->nom;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getPrix(){
        return $this->prix;
    }

    public function getLocalisation()
    {
        return $this->lieu;
    }
}