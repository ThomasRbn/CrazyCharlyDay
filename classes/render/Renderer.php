<?php

namespace ccd\render;

/**
 * Used to return HTML
 */
interface Renderer
{
    const COMPACT=1;
    const DETAIL=2;

    public function render(): string;

}