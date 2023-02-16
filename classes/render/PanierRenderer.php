<?php

namespace ccd\render;

class PanierRenderer
{
    public function render($panier): string
    {
        $html = '<table>';
        foreach ($panier->getContenu() as $produit) {
            $html .= '<tr>';
            $html .= '<td>' . $produit['produit']->getNom() . '</td>';
            $html .= '<td>' . $produit['quantite'] . '</td>';
            $html .= '<td>' . $produit['produit']->getPrix() . '</td>';
            $html .= '</tr>';
        }
        $html .= '</table>';
        return $html;
    }
}