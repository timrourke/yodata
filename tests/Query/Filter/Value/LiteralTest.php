<?php

declare(strict_types=1);

namespace Yodata\Tests\Query\Value;

use Yodata\Query\Filter\Value\Literal;
use PHPUnit\Framework\TestCase;

class LiteralTest extends TestCase
{
    /**
     * @test
     */
    public function shouldRenderValueAsStringWithoutAdditionalFormatting(): void
    {
        $expectedValue = '7.45982';

        $literal = new Literal((float) $expectedValue);

        static::assertSame(
            $expectedValue,
            $literal->__toString()
        );
    }
}
