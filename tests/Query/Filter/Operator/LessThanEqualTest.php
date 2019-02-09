<?php

namespace Yodata\Tests\Query\Filter\Operator;

use PHPUnit\Framework\TestCase;
use Yodata\Query\Filter\Operator\LessThanEqual;
use Yodata\Query\Filter\Value\Literal;

class LessThanEqualTest extends TestCase
{
    /**
     * @test
     */
    public function shouldRenderLessThanEqualExpression(): void
    {
        $expectedValue      = 932;
        $expectedExpression = "le $expectedValue";

        $value = new Literal($expectedValue);

        $lessThanEqual = new LessThanEqual($value);

        static::assertSame(
            $expectedExpression,
            $lessThanEqual->__toString()
        );
    }
}
