<?php

namespace Pixo\BEM\Twig;

use Pixo\BEM\Selector;

class BemFunction extends \Twig_SimpleFunction
{
    public function __construct(array $options = [])
    {
        parent::__construct('bem', [Selector::class, 'make'], $options);
    }
}
