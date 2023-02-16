<?php

namespace ccd\render;

use ccd\catalogue\Catalogue;
use ccd\db\ConnectionFactory;
use ccd\exception\InvalidPropertyNameException;

class CatalogueRenderer implements Renderer
{

    private Catalogue $catalogue;

    public function __construct(Catalogue $catalogue)
    {
        $this->catalogue = $catalogue;
    }

    public function render(): string
    {

        // Récupération du numéro de page à afficher
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

        // Nombre de produits à afficher par page
        $produits_par_page = 5;

        // Calcul de l'indice de départ et de fin pour la page courante
        $debut = ($page - 1) * $produits_par_page;
        $fin = $debut + $produits_par_page;

        try {
            $nom = $this->catalogue->__get("nom");
        } catch (InvalidPropertyNameException $e) {
            $nom = "CATALOG";
        }

        $html = '<body id="accueil">';
        $html .= '<div id="header">';
        $html .= '<img style="" src="img/logoCC.jpg" alt="logo" width="17%" height="10%">';
        $html .= '<div id="menu" style="grid-column: 2">';
        $db = ConnectionFactory::makeConnection();
        $query = $db->prepare("SELECT * FROM user WHERE email = :email");
        $query->execute(['email' => $_SESSION['email']]);
        $user = $query->fetch();
        if (isset($_SESSION['email'])) {
            $html .= '<p style="color: white">Bonjour ' . $user['prenom'] . ' ' . $user['nom'] . '</p>';
            $html .= '<a style="color: white" href="?action=logout">Déconnexion</a>';
        }
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div id="catalog-container">';
        $html .= '<link rel="stylesheet" href="style.css">';
        $html .= '<div><label id="title">' . $nom . '</label></div>';
        $html .= '<div id="catalog">';

        $produits = $this->catalogue->__get("produits");


        // Affichage de la liste des produits pour la page courante
        for ($i = $debut; $i < $fin && $i < count($produits); $i++) {
            $produit = $produits[$i];
            $renderer = new RenderProduitCatalogue($produit);
            $html .= $renderer->render();
        }

        // Affichage des liens de pagination
        $html .= '<div class="pagination">';
        $nb_pages = ceil(count($produits) / $produits_par_page);
        if ($page > 1) {
            $html .= '<a class="page" href="?action=show-catalog-action&page=' . ($page - 1) . '">&#8249;</a>';
        }

        for ($i = 1; $i <= $nb_pages; $i++) {
            $active = $i == $page ? ' active' : '';
            $html .= '<a class="page' . $active . '" href="?action=show-catalog-action&page=' . $i . '">' . $i . '</a>';
        }

        if ($page < $nb_pages) {
            $html .= '<a class="page" href="?action=show-catalog-action&page=' . ($page + 1) . '">&#8250;</a>';
        }
        $html .= '</div> </div>';
        $html .= "</body>";

        return $html;
    }
}