<?php

declare(strict_types=1);

namespace Yodata\Tests\Query\Filter\LogicalOperator;

use Yodata\Query\Filter\Expression;
use Yodata\Query\Filter\LogicalOperator\NotOperator;
use PHPUnit\Framework\TestCase;
use Yodata\Query\Filter\Operator\Equal;
use Yodata\Query\Filter\Value\IntValue;

class NotOperatorTest extends TestCase
{
    /**
     * @test
     */
    public function shouldRenderNot(): void
    {
        $notOperator = new NotOperator(
            new Expression('SomeField', new Equal(new IntValue(10)))
        );

        static::assertSame(
            ' not SomeField eq 10',
            $notOperator->__toString()
        );
    }
}
