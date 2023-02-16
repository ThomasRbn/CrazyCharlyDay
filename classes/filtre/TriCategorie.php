<?php

namespace ccd\filtre;

class TriCategorie implements Tri
{
    public function filtrer(array $produits): array
    {
        usort($produits, function ($a, $b) {
            return $a->__get("categorie") < $b->__get("categorie");
        });
        return $produits;
    }
}