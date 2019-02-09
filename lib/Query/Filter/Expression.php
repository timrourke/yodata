<?php

declare(strict_types=1);

namespace Yodata\Query\Filter;

use Yodata\Query\Filter\Operator\OperatorInterface;

class Expression implements ExpressionInterface
{
    /**
     * @var string
     */
    private $field;

    /**
     * @var \Yodata\Query\Filter\Operator\OperatorInterface
     */
    private $operator;

    public function __construct(string $field, OperatorInterface $operator)
    {
        $this->field = $field;
        $this->operator = $operator;
    }

    public function and(ExpressionInterface $expression): ExpressionInterface
    {
        return $this;
    }

    public function or(ExpressionInterface $expression): ExpressionInterface
    {
        return $this;
    }

    public function not(ExpressionInterface $expression): ExpressionInterface
    {
        return $this;
    }

    public function __toString(): string
    {
        return sprintf(
            '%s %s',
            $this->field,
            $this->operator
        );
    }
}
