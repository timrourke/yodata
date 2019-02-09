<?php

declare(strict_types=1);

namespace Yodata\Tests\Query\Filter\Value;

use PHPUnit\Framework\TestCase;
use Yodata\Query\Filter\Value\StringValue;

class StringValueTest extends TestCase
{
    /**
     * @test
     */
    public function shouldWrapStringValueInQuotes(): void
    {
        $value         = 'hotdogs';
        $expectedValue = "'hotdogs'";

        $stringValue = new StringValue($value);

        static::assertSame(
            $expectedValue,
            $stringValue->__toString()
        );
    }
}
