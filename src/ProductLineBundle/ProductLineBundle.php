<?php

namespace ProductLineBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ProductLineBundle extends Bundle
{
    public function getParent() {
        return 'FOSUserBundle';
    }
}
