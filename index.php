<?php
ini_set('display_errors', 1);

//Configuration
require_once 'vendor/autoload.php';

use ccd\db\ConnectionFactory;

session_start();
ConnectionFactory::setConfig('./classes/db/db.config.ini');


//Affichage
$page = new \ccd\render\RenderPage();
echo $page->render();