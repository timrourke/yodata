<?php

declare(strict_types=1);

namespace Yodata\Tests\Query\Filter;

use PHPUnit\Framework\TestCase;
use Yodata\Query\Filter\Expression;
use Yodata\Query\Filter\Operator\Equal;
use Yodata\Query\Filter\Operator\GreaterThan;
use Yodata\Query\Filter\Operator\GreaterThanEqual;
use Yodata\Query\Filter\Operator\Has;
use Yodata\Query\Filter\Operator\LessThan;
use Yodata\Query\Filter\Operator\NotEqual;
use Yodata\Query\Filter\Value\IntValue;
use Yodata\Query\Filter\Value\StringValue;

class ExpressionTest extends TestCase
{
    /**
     * @test
     */
    public function shouldRenderSimpleExpression(): void
    {
        $expectedField = 'FirstName';
        $expectedValue = 'Priscilla';

        $value = new StringValue($expectedValue);

        $operator = new Equal($value);

        $expression = new Expression($expectedField, $operator);

        static::assertSame(
            "FirstName eq 'Priscilla'",
            $expression->__toString()
        );
    }

    /**
     * @test
     */
    public function shouldRenderAndExpression(): void
    {
        $expression = new Expression('Flavor', new Equal(new StringValue('vanilla')));

        $expression->and(
            new Expression('Size', new GreaterThan(new StringValue('large')))
        );

        static::assertSame(
            "Flavor eq 'vanilla' and Size gt 'large'",
            $expression->__toString()
        );
    }

    /**
     * @test
     */
    public function shouldRenderMultipleAndExpressions(): void
    {
        $expression = (
            new Expression('Mammal', new NotEqual(new StringValue('dog')))
        )->and(
            new Expression('Fish', new Equal(new StringValue('great white shark')))
        )->and(
            new Expression('Insect', new Has('Attributes', new StringValue('hasWings')))
        );

        static::assertSame(
            "Mammal ne 'dog' and Fish eq 'great white shark' and Insect has Attributes'hasWings'",
            $expression->__toString()
        );
    }

    /**
     * @test
     */
    public function shouldRenderOrExpression(): void
    {
        $expression = new Expression(
            'NumWindows',
            new GreaterThanEqual(new IntValue(12))
        );

        $expression->or(
            new Expression(
                'NumWindows',
                new LessThan(new IntValue(20))
            )
        );

        static::assertSame(
            "NumWindows ge 12 or NumWindows lt 20",
            $expression->__toString()
        );
    }

    /**
     * @test
     */
    public function shouldRenderMultipleOrExpressions(): void
    {
        $expression = (
            new Expression('Lunch', new NotEqual(new StringValue('fish sticks')))
        )->or(
            new Expression('Dinner', new Equal(new StringValue('tortellini')))
        )->or(
            new Expression('Breakfast', new Equal(new StringValue('pancakes')))
        );

        static::assertSame(
            "Lunch ne 'fish sticks' or Dinner eq 'tortellini' or Breakfast eq 'pancakes'",
            $expression->__toString()
        );
    }

    /**
     * @test
     */
    public function shouldRenderNotExpression(): void
    {
        $expression = new Expression(
            'YearBuilt',
            new GreaterThanEqual(new IntValue(1996))
        );

        $expression->not(
            new Expression(
                'YearBuilt',
                new Equal(new IntValue(2001))
            )
        );

        static::assertSame(
            "YearBuilt ge 1996 not YearBuilt eq 2001",
            $expression->__toString()
        );
    }

    /**
     * @test
     */
    public function shouldRenderMultipleNotExpressions(): void
    {
        $expression = (
            new Expression('Type', new Equal(new StringValue('shirt')))
        )->not(
            new Expression('Type', new Equal(new StringValue('pants')))
        )->not(
            new Expression('Type', new Equal(new StringValue('hat')))
        );

        static::assertSame(
            "Type eq 'shirt' not Type eq 'pants' not Type eq 'hat'",
            $expression->__toString()
        );
    }

    /**
     * @test
     */
    public function shouldCombineLogicalOperators(): void
    {
        $expression = (
            new Expression('Foo', new Equal(new StringValue('bar')))
        )->and(
            new Expression('SomeNumber', new GreaterThanEqual(new IntValue(23)))
        )->or(
            new Expression('SomeString', new NotEqual(new StringValue('blah')))
        );

        static::assertSame(
            "Foo eq 'bar' and SomeNumber ge 23 or SomeString ne 'blah'",
            $expression->__toString()
        );
    }
}
