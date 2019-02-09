<?php

declare(strict_types=1);

namespace Yodata\Tests\Query\Filter\Operator;

use PHPUnit\Framework\TestCase;
use Yodata\Query\Filter\Operator\Has;
use Yodata\Query\Filter\Value\StringValue;

class HasTest extends TestCase
{
    /**
     * @test
     */
    public function shouldRenderHasFlagExpression(): void
    {
        $expectedEnumField = 'IceCream.Flavors';
        $expectedValue     = 'Strawberry';

        $value = new StringValue($expectedValue);

        $has = new Has($expectedEnumField, $value);

        static::assertSame(
            "has IceCream.Flavors'Strawberry'",
            $has->__toString()
        );
    }
}
