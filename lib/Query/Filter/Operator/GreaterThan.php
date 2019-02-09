<?php

declare(strict_types=1);

namespace Yodata\Query\Filter\Operator;

class GreaterThan extends AbstractOperator
{
    protected function getOperator(): string
    {
        return 'gt';
    }
}
