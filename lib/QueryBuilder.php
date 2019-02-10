<?php

declare(strict_types=1);

namespace Yodata;

use Yodata\Query\Filter\Expression;
use Yodata\Query\Filter\ExpressionInterface;
use Yodata\Query\Filter\GroupedExpression;
use Yodata\Query\Filter\Operator\Equal;
use Yodata\Query\Filter\Operator\GreaterThan;
use Yodata\Query\Filter\Operator\GreaterThanEqual;
use Yodata\Query\Filter\Operator\Has;
use Yodata\Query\Filter\Operator\LessThan;
use Yodata\Query\Filter\Operator\LessThanEqual;
use Yodata\Query\Filter\Operator\NotEqual;
use Yodata\Query\Filter\Operator\OperatorInterface;
use Yodata\Query\Filter\Value\StringValue;
use Yodata\Query\Filter\Value\ValueInterface;

class QueryBuilder
{
    /**
     * @var \Yodata\Query\Filter\ExpressionInterface
     */
    private $filter;

    public function expression(string $field, OperatorInterface $operator): Expression
    {
        return new Expression($field, $operator);
    }

    public function groupedExpression(ExpressionInterface $expression): GroupedExpression
    {
        return new GroupedExpression($expression);
    }

    public function where(ExpressionInterface $expression): self
    {
        $this->filter = $expression;

        return $this;
    }

    public function eq(ValueInterface $value): Equal
    {
        return new Equal($value);
    }

    public function ne(ValueInterface $value): NotEqual
    {
        return new NotEqual($value);
    }

    public function gt(ValueInterface $value): GreaterThan
    {
        return new GreaterThan($value);
    }

    public function ge(ValueInterface $value): GreaterThanEqual
    {
        return new GreaterThanEqual($value);
    }

    public function lt(ValueInterface $value): LessThan
    {
        return new LessThan($value);
    }

    public function le(ValueInterface $value): LessThanEqual
    {
        return new LessThanEqual($value);
    }

    public function has(string $enumField, StringValue $value): Has
    {
        return new Has($enumField, $value);
    }

    public function query(): string
    {
        return (string) $this->filter;
    }
}
