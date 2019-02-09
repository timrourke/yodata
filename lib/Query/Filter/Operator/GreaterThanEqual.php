<?php

declare(strict_types=1);

namespace Yodata\Query\Filter\Operator;

class GreaterThanEqual extends AbstractOperator
{
    protected function getOperator(): string
    {
        return 'ge';
    }
}
