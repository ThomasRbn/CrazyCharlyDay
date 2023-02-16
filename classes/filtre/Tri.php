<?php

namespace ccd\filtre;

interface Tri
{
    const FILTRE_LIEU = 0;
    const FILTRE_CATEGORIE = 1;

    public function filtrer(array $produits): array;
}