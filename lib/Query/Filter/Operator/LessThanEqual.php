<?php

declare(strict_types=1);

namespace Yodata\Query\Filter\Operator;

class LessThanEqual extends AbstractOperator
{
    protected function getOperator(): string
    {
        return 'le';
    }
}
