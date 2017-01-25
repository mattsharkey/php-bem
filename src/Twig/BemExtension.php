<?php

namespace Pixo\BEM\Twig;

class BemExtension extends \Twig_Extension
{
    public function getFunctions()
    {
        return [new BemFunction()];
    }

    public function getTokenParsers()
    {
        return [new BemTokenParser()];
    }
}
