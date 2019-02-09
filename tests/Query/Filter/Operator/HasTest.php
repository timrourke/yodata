<?php

declare(strict_types=1);

namespace Yodata\Tests\Query\Operator;

use PHPUnit\Framework\TestCase;
use Yodata\Query\Filter\Operator\Has;
use Yodata\Query\Filter\Value\Literal;

class HasTest extends TestCase
{
    /**
     * @test
     */
    public function shouldRenderHasFlagExpression(): void
    {
        $expectedValue = "IceCream.Flavor'Strawberry'";
        $expectedExpression = "has $expectedValue";

        $value = new Literal($expectedValue);

        $has = new Has($value);

        static::assertSame(
            $expectedExpression,
            $has->__toString()
        );
    }
}
