<?php

//Configuration
require_once 'vendor/autoload.php';

use ccd\dispatch\Dispatcher;
use ccd\db\ConnectionFactory;

session_start();
ConnectionFactory::setConfig('./db.config.ini');


//Affichage
$page = new \ccd\render\RenderPage();
echo $page->render();