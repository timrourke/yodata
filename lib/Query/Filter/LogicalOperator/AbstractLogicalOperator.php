<?php

declare(strict_types=1);

namespace Yodata\Query\Filter\LogicalOperator;

use Yodata\Query\Filter\ExpressionInterface;

abstract class AbstractLogicalOperator implements LogicalOperatorInterface
{
    /**
     * @var \Yodata\Query\Filter\ExpressionInterface
     */
    protected $expression;

    abstract protected function getOperator(): string;

    public function __construct(ExpressionInterface $expression)
    {
        $this->expression = $expression;
    }

    public function expression(): ExpressionInterface
    {
        return $this->expression;
    }

    public function and(ExpressionInterface $expression): void
    {
        $this->expression->and($expression);
    }

    public function or(ExpressionInterface $expression): void
    {
        $this->expression->or($expression);
    }

    public function __toString(): string
    {
        return sprintf(
            ' %s %s',
            $this->getOperator(),
            $this->expression
        );
    }
}
