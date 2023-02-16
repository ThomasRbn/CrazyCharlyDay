<?php

namespace ccd\dispatch;

use Exception;

class Dispatcher
{
    public ?string $action;

    public function __construct()
    {
        $this->action = $_GET['action'] ?? null;
    }

    public function run(): ?string
    {
        if (isset($_GET['action'])) {
            $affichage = "";
            switch ($_GET['action']){
                case "showProduct" :
                    $action = new \ccd\action\ActionShowProduct();
                    $affichage .= $action->execute();
                    break;
            }
            return $affichage;
        }
        return null;
//        try {
//            $this->renderPage($action->execute());
//        } catch (Exception $e) {
//            $this->renderPage($e->getMessage());
//        }
    }


    private function renderPage(string $html): void
    {
        echo $html;
    }

}