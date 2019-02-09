<?php

namespace Yodata\Tests\Query\Operator;

use PHPUnit\Framework\TestCase;
use Yodata\Query\Filter\Operator\GreaterThanEqual;
use Yodata\Query\Filter\Value\Literal;

class GreaterThanEqualTest extends TestCase
{
    /**
     * @test
     */
    public function shouldRenderGreaterThanEqualExpression(): void
    {
        $expectedValue = 34;
        $expectedExpression = "ge $expectedValue";

        $value = new Literal($expectedValue);

        $greaterThanEqual = new GreaterThanEqual($value);

        static::assertSame(
            $expectedExpression,
            $greaterThanEqual->__toString()
        );
    }
}
