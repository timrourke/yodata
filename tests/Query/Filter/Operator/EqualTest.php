<?php

declare(strict_types=1);

namespace Yodata\Tests\Query\Filter\Operator;

use PHPUnit\Framework\TestCase;
use Yodata\Query\Filter\Operator\Equal;
use Yodata\Query\Filter\Value\Literal;

class EqualTest extends TestCase
{
    /**
     * @test
     */
    public function shouldRenderEqualityExpression(): void
    {
        $expectedValue      = 3.14;
        $expectedExpression = "eq $expectedValue";

        $value = new Literal($expectedValue);

        $equal = new Equal($value);

        static::assertSame(
            $expectedExpression,
            $equal->__toString()
        );
    }
}
