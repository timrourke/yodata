<?php

declare(strict_types=1);

namespace Yodata\Tests\Query\Filter\LogicalOperator;

use Yodata\Query\Filter\Expression;
use Yodata\Query\Filter\LogicalOperator\AndOperator;
use PHPUnit\Framework\TestCase;
use Yodata\Query\Filter\Operator\Equal;
use Yodata\Query\Filter\Value\IntValue;

class AndOperatorTest extends TestCase
{
    /**
     * @test
     */
    public function shouldRenderAnd(): void
    {
        $andOperator = new AndOperator(
            new Expression('SomeField', new Equal(new IntValue(10)))
        );

        static::assertSame(
            ' and SomeField eq 10',
            $andOperator->__toString()
        );
    }
}
