<?php

namespace Danidinogo\Bundle\EaExtendedBundle;

use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class EaExtendedBundle extends AbstractBundle {

    public function __construct()
    {
        
    }

    public function getPath(): string
    {
        return dirname(__DIR__);
    }
}