<?php

declare(strict_types=1);

namespace Yodata\Query\Filter;

use Yodata\Query\Filter\LogicalOperator\AndOperator;
use Yodata\Query\Filter\LogicalOperator\LogicalOperatorInterface;
use Yodata\Query\Filter\LogicalOperator\OrOperator;

class GroupedExpression implements ExpressionInterface
{
    /**
     * @var \Yodata\Query\Filter\ExpressionInterface
     */
    private $expression;

    /**
     * @var \Yodata\Query\Filter\LogicalOperator\LogicalOperatorInterface[]
     */
    private $siblings = [];

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
        $this->siblings[] = new AndOperator($expression);

        return $this;
    }

    public function orWhere(GroupedExpression $expression): GroupedExpression
    {
        $this->siblings[] = new OrOperator($expression);

        return $this;
    }

    public function __toString(): string
    {
        $siblings = array_map(
            function (LogicalOperatorInterface $operator) {
                return (string) $operator;
            },
            $this->siblings
        );

        return sprintf('(%s)', $this->expression) . implode('', $siblings);
    }
}
