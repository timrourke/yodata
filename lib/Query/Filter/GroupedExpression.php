<?php

declare(strict_types=1);

namespace Yodata\Query\Filter;

use Yodata\Query\Filter\LogicalOperator\AndOperator;
use Yodata\Query\Filter\LogicalOperator\NotOperator;
use Yodata\Query\Filter\LogicalOperator\OrOperator;

class GroupedExpression implements ExpressionInterface
{
    /**
     * @var \Yodata\Query\Filter\ExpressionInterface
     */
    private $expression;

    /**
     * @var \Yodata\Query\Filter\LogicalOperator\LogicalOperatorInterface
     */
    private $nextSibling;

    public function __construct(ExpressionInterface $expression)
    {
        $this->expression = $expression;
    }

    public function and(ExpressionInterface $expression): ExpressionInterface
    {
        $this->expression->and($expression);

        return $this;
    }

    public function or(ExpressionInterface $expression): ExpressionInterface
    {
        $this->expression->or($expression);

        return $this;
    }

    public function andWhere(GroupedExpression $expression): GroupedExpression
    {
        if (null !== $this->nextSibling) {
            $this->nextSibling->and($expression);
        } else {
            $this->nextSibling = new AndOperator($expression);
        }

        return $this;
    }

    public function orWhere(GroupedExpression $expression): GroupedExpression
    {
        if (null !== $this->nextSibling) {
            $this->nextSibling->or($expression);
        } else {
            $this->nextSibling = new OrOperator($expression);
        }

        return $this;
    }

    public function __toString(): string
    {
        return sprintf(
            '(%s)%s',
            $this->expression,
            (string) $this->nextSibling
        );
    }
}
