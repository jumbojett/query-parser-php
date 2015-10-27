<?php

namespace Gdbots\Tests\QueryParser\Node;

use Gdbots\QueryParser\QueryScanner;
use Gdbots\QueryParser\Node\Word;
use Gdbots\QueryParser\Node\ExplicitTerm;

class ExplicitTest extends \PHPUnit_Framework_TestCase
{
    /** @var Word */
    protected $word;

    /** @var ExplicitTerm */
    protected $explicit;

    public function setUp()
    {
        $this->word = new Word('John');
        $this->explicitTerm = new ExplicitTerm('people', QueryScanner::T_FILTER, ':', $this->word);
    }

    public function tearDown()
    {
        $this->word = null;
        $this->explicitTerm = null;
    }

    public function testGetNominator()
    {
        $this->assertEquals('people', $this->explicitTerm->getNominator());
    }

    public function testGetTerm()
    {
        $this->assertEquals($this->word, $this->explicitTerm->getTerm());
    }

    public function testToArray()
    {
        $array = [
            'Expression' => 'Explicit Term',
            'Nominator' => 'people',
            'Term' => $this->word,
            'TokenType' => QueryScanner::T_FILTER,
            'TokenTypeText' => ':'
        ];

        $this->assertEquals($array, $this->explicitTerm->toArray());
    }
}
