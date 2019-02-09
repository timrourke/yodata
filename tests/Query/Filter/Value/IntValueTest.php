<?php

declare(strict_types=1);

namespace Yodata\Tests\Query\Filter\Value;

use PHPUnit\Framework\TestCase;
use Yodata\Query\Filter\Value\IntValue;

class IntValueTest extends TestCase
{
    /**
     * @test
     */
    public function shouldWrapStringValueInQuotes(): void
    {
        $value         = 10;
        $expectedValue = "10";

        $stringValue = new IntValue($value);

        static::assertSame(
            $expectedValue,
            $stringValue->__toString()
        );
    }
}
