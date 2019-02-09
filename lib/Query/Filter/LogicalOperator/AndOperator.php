<?php

declare(strict_types=1);

namespace Yodata\Query\Filter\LogicalOperator;

class AndOperator extends AbstractLogicalOperator
{
    protected function getOperator(): string
    {
        return 'and';
    }
}
