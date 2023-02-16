<?php

namespace ccd\render;

use ccd\dispatch\Dispatcher;

class RenderPage implements Renderer
{
    public function render(): string
    {
        $dispatcher = new Dispatcher();
        return <<<HTML
        <p>Toto</p>
        {$dispatcher->run()}
        <a href="?action=showProduct&produit=1">Produit</a>
        HTML;
    }


}