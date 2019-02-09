<?php

declare(strict_types=1);

namespace Yodata\Query\Filter;

use Yodata\Query\Filter\LogicalOperator\AndOperator;
use Yodata\Query\Filter\LogicalOperator\LogicalOperatorInterface;
use Yodata\Query\Filter\LogicalOperator\NotOperator;
use Yodata\Query\Filter\LogicalOperator\OrOperator;
use Yodata\Query\Filter\Operator\OperatorInterface;

class Expression implements ExpressionInterface
{
    /**
     * @var string
     */
    protected $field;

    /**
     * @var \Yodata\Query\Filter\Operator\OperatorInterface
     */
    protected $operator;

    /**
     * @var \Yodata\Query\Filter\LogicalOperator\LogicalOperatorInterface
     */
    protected $nextSibling;

    public function __construct(string $field, OperatorInterface $operator)
    {
        $this->field    = $field;
        $this->operator = $operator;
    }

    public function and(ExpressionInterface $expression): ExpressionInterface
    {
        if (null !== $this->nextSibling) {
            $this->nextSibling->and($expression);

            return $this;
        }

        $this->nextSibling = new AndOperator($expression);

        return $this;
    }

    public function or(ExpressionInterface $expression): ExpressionInterface
    {
        if (null !== $this->nextSibling) {
            $this->nextSibling->or($expression);

            return $this;
        }

        $this->nextSibling = new OrOperator($expression);

        return $this;
    }

    public function __toString(): string
    {
        return sprintf(
            '%s %s%s',
            $this->field,
            $this->operator,
            (string) $this->nextSibling
        );
    }

    protected function nextSibling(): LogicalOperatorInterface
    {
        return $this->nextSibling;
    }
}
