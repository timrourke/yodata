<?php

declare(strict_types=1);

namespace Yodata\Query\Filter\Operator;

class Has extends AbstractOperator
{
    protected function getOperator(): string
    {
        return 'has';
    }
}
