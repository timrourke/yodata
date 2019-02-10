<?php

declare(strict_types=1);

namespace Yodata\Query\Filter\LogicalOperator;

use Yodata\Query\Filter\ExpressionInterface;

interface LogicalOperatorInterface
{
    public function and(ExpressionInterface $expression): void;
    public function or(ExpressionInterface $expression): void;
    public function expression(): ExpressionInterface;
    public function __toString(): string;
}
