<?php

namespace ccd\render;

use ccd\dispatch\Dispatcher;

class RenderPage implements Renderer
{
    public function render(): string
    {
        $dispatcher = new Dispatcher();
        return <<<HTML
        <main>
        {$dispatcher->run()}
        </main>
        HTML;
    }


}