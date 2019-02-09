<?php

namespace Yodata\Tests\Query\Filter\Operator;

use PHPUnit\Framework\TestCase;
use Yodata\Query\Filter\Operator\LessThan;
use Yodata\Query\Filter\Value\Literal;

class LessThanTest extends TestCase
{
    /**
     * @test
     */
    public function shouldRenderLessThanExpression(): void
    {
        $expectedValue = 84;
        $expectedExpression = "lt $expectedValue";

        $value = new Literal($expectedValue);

        $lessThan = new LessThan($value);

        static::assertSame(
            $expectedExpression,
            $lessThan->__toString()
        );
    }
}
