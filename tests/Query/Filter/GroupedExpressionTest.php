<?php

declare(strict_types=1);

namespace Yodata\Tests\Query\Filter;

use PHPUnit\Framework\TestCase;
use Yodata\Query\Filter\Expression;
use Yodata\Query\Filter\GroupedExpression;
use Yodata\Query\Filter\Operator\Equal;
use Yodata\Query\Filter\Operator\GreaterThanEqual;
use Yodata\Query\Filter\Operator\LessThan;
use Yodata\Query\Filter\Operator\NotEqual;
use Yodata\Query\Filter\Value\FloatValue;
use Yodata\Query\Filter\Value\IntValue;
use Yodata\Query\Filter\Value\StringValue;

class GroupedExpressionTest extends TestCase
{
    /**
     * @test
     */
    public function shouldWrapExpressionInParentheses(): void
    {
        $expression = new Expression(
            'Singer.Name',
            new Equal(new StringValue('Aretha Franklin'))
        );

        $groupedExpression = new GroupedExpression($expression);

        static::assertSame(
            "(Singer.Name eq 'Aretha Franklin')",
            $groupedExpression->__toString()
        );
    }

    /**
     * @test
     */
    public function shouldWrapChainedExpressionsInParentheses(): void
    {
        $expressions = (
            new Expression(
                'SomeNumber',
                new GreaterThanEqual(new IntValue(6))
            )
        )->and(
            new Expression(
                'SomeNumber',
                new LessThan(new FloatValue(11.3))
            )
        );

        $groupedExpression = new GroupedExpression($expressions);

        static::assertSame(
            "(SomeNumber ge 6 and SomeNumber lt 11.3)",
            $groupedExpression->__toString()
        );
    }

    /**
     * @test
     */
    public function shouldChainGroupedExpressionsWithAndLogicalOperators(): void
    {
        $expression1 = new Expression('Foo', new Equal(new IntValue(9)));
        $expression2 = new Expression('Bar', new Equal(new IntValue(45)));

        $groupedExpression = (
            new GroupedExpression($expression1)
        )->andWhere(
            new GroupedExpression($expression2)
        );

        static::assertSame(
            "(Foo eq 9) and (Bar eq 45)",
            $groupedExpression->__toString()
        );
    }

    /**
     * @test
     */
    public function shouldChainGroupedExpressionsWithOrLogicalOperators(): void
    {
        $expression1 = new Expression('Foo', new Equal(new StringValue('Blah')));
        $expression2 = new Expression('Bar', new Equal(new StringValue('Bleh')));

        $groupedExpression = (
            new GroupedExpression($expression1)
        )->orWhere(
            new GroupedExpression($expression2)
        );

        static::assertSame(
            "(Foo eq 'Blah') or (Bar eq 'Bleh')",
            $groupedExpression->__toString()
        );
    }

    /**
     * @test
     */
    public function shouldChainExpressionsWithLogicalOperatorsToInsideOfGroup(): void
    {
        $expression = new Expression('Foo', new NotEqual(new StringValue('Bar')));

        $groupedExpression = (
            new GroupedExpression($expression)
        )->and(
            new Expression('Baz', new Equal(new StringValue('Blah')))
        );

        static::assertSame(
            "(Foo ne 'Bar' and Baz eq 'Blah')",
            $groupedExpression->__toString()
        );
    }
}
