<?php

namespace Pixo\BEM\Twig;

class BemNode extends \Twig_Node
{
    public function compile(\Twig_Compiler $compiler)
    {
        $compiler
            ->addDebugInfo($this)
            ->write('$context[\'bem\'] = new \\Pixo\\BEM\\Selector(')
            ->subcompile($this->getNode('name'))
            ->raw(");\n")
            ->subcompile($this->getNode('body'))
            ->write("unset(\$context['bem']);\n")
        ;
    }
}
