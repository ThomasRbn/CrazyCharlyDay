<?php

namespace ccd\action\ModificationProduit;

use ccd\action\Action;
use ccd\db\ConnectionFactory;

class MiseAJourDescriptionAction extends Action
{

    public function execute(): string
    {
        $reponse = "modification non effectué";
        $connection = ConnectionFactory::makeConnection();
        $stat = $connection->exec('select status from user where email=$_SESSION["email"]');
        if ($stat == 0) {
            $connection->exec('update produit set description=$_POST["description"],categorie=$_POST["categorie"],nom=$_POST["nomProduit"],prix=$_POST["prix"], where id=$_GET["produit"]');
            $reponse = 'modification effectué';
        }
        return $reponse;
    }
}