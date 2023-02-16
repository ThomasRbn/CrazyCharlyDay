<?php

namespace ccd\filtre;

class TriLieu implements Tri
{

    public function filtrer(array $produits): array
    {
        usort($produits, function ($a, $b) {
            return $a->__get("lieu") < $b->__get("lieu");
        });
        return $produits;
    }
}