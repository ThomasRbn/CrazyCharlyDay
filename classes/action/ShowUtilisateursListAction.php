<?php

namespace ccd\action;
use ccd\catalogue\Catalogue;
use ccd\db\ConnectionFactory;


class ShowUtilisateursListAction extends Action
{

    /**
     * @param Catalogue $catalogue
     * Constructeur paramétré
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function execute(): string
    {
        $connection = ConnectionFactory::makeConnection();
        $resultset = $connection->prepare("SELECT * FROM user");
        $resultset->execute();
        $html="";
        while ($row = $resultset->fetch()) {
            $html.= <<<END
<div class="utilisateurList">
            <div class="description">
                <a href="?action=showUtilisateur&utilisateur={$row['email']}"><h3>{$row['nom']}</h3></a>
            </div>
        </div>
END;
        }
        $connection = null;
        return $html;
    }


}