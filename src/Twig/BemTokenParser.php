<?php

namespace Pixo\BEM\Twig;

use Twig_Token;

class BemTokenParser extends \Twig_TokenParser
{
    public function parse(Twig_Token $token)
    {
        $lineno = $token->getLine();
        $parser = $this->parser;
        $stream = $parser->getStream();
        $name = $parser->getExpressionParser()->parseExpression();
        $stream->expect(Twig_Token::BLOCK_END_TYPE);
        $body = $this->parser->subparse([$this, 'decideBemEnd']);
        $stream->expect(Twig_Token::NAME_TYPE, 'endbem');
        $stream->expect(Twig_Token::BLOCK_END_TYPE);
        return new BemNode(['name' => $name, 'body' => $body], [], $lineno, $this->getTag());
    }

    public function decideBemEnd(Twig_Token $token)
    {
        return $token->test(['endbem']);
    }

    public function getTag()
    {
        return 'bem';
    }
}
