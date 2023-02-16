<?php

namespace ccd\render;

use ccd\dispatch\Dispatcher;

class RenderPage implements Renderer
{
    public function render(): string
    {
        $dispatcher = new Dispatcher();
        return <<<HTML
        <head>
            <link rel="stylesheet" href="style.css">
        </head>
        {$dispatcher->run()}
        HTML;
    }


}