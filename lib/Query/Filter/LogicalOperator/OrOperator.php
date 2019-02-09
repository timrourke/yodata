<?php

declare(strict_types=1);

namespace Yodata\Query\Filter\LogicalOperator;

class OrOperator extends AbstractLogicalOperator
{
    protected function getOperator(): string
    {
        return 'or';
    }
}
