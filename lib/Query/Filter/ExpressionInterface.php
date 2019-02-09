<?php

declare(strict_types=1);

namespace Yodata\Query\Filter;

interface ExpressionInterface
{
    public function and(ExpressionInterface $expression): ExpressionInterface;
    public function or(ExpressionInterface $expression): ExpressionInterface;
    public function not(ExpressionInterface $expression): ExpressionInterface;
    public function __toString(): string;
}
