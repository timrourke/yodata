<?php

declare(strict_types=1);

namespace Yodata\Tests\Query\Filter\Value;

use PHPUnit\Framework\TestCase;
use Yodata\Query\Filter\Value\FloatValue;

class FloatValueTest extends TestCase
{
    /**
     * @test
     */
    public function shouldRenderFloatValue(): void
    {
        $value         = 28.732;
        $expectedValue = "28.732";

        $stringValue = new FloatValue($value);

        static::assertSame(
            $expectedValue,
            $stringValue->__toString()
        );
    }
}
