<?php

declare(strict_types=1);

namespace Yodata\Tests\Query\Filter\LogicalOperator;

use Yodata\Query\Filter\Expression;
use Yodata\Query\Filter\LogicalOperator\OrOperator;
use PHPUnit\Framework\TestCase;
use Yodata\Query\Filter\Operator\Equal;
use Yodata\Query\Filter\Value\IntValue;

class OrOperatorTest extends TestCase
{
    /**
     * @test
     */
    public function shouldRenderAnd(): void
    {
        $andOperator = new OrOperator(
            new Expression('SomeField', new Equal(new IntValue(10)))
        );

        static::assertSame(
            ' or SomeField eq 10',
            $andOperator->__toString()
        );
    }
}
