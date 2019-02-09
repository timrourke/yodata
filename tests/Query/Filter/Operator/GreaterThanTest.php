<?php

namespace Yodata\Tests\Query\Filter\Operator;

use PHPUnit\Framework\TestCase;
use Yodata\Query\Filter\Operator\GreaterThan;
use Yodata\Query\Filter\Value\Literal;

class GreaterThanTest extends TestCase
{
    /**
     * @test
     */
    public function shouldRenderGreaterThanExpression(): void
    {
        $expectedValue      = 91252;
        $expectedExpression = "gt $expectedValue";

        $value = new Literal($expectedValue);

        $greaterThan = new GreaterThan($value);

        static::assertSame(
            $expectedExpression,
            $greaterThan->__toString()
        );
    }
}
