<?php

namespace Yodata\Tests\Query\Filter\Operator;

use PHPUnit\Framework\TestCase;
use Yodata\Query\Filter\Operator\NotEqual;
use Yodata\Query\Filter\Value\Literal;

class NotEqualTest extends TestCase
{
    /**
     * @test
     */
    public function shouldRenderNotEqualExpression(): void
    {
        $expectedValue = "'some string'";
        $expectedExpression = "ne $expectedValue";

        $value = new Literal($expectedValue);

        $notEqual = new NotEqual($value);

        static::assertSame(
            $expectedExpression,
            $notEqual->__toString()
        );
    }
}
