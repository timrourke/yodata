<?php

declare(strict_types=1);

namespace Yodata\Query\Filter\Operator;

use Yodata\Query\Filter\Value\Literal;
use Yodata\Query\Filter\Value\StringValue;

class Has extends AbstractOperator
{
    public function __construct(string $enumField, StringValue $value)
    {
        parent::__construct(
            new Literal(
                sprintf(
                    '%s%s',
                    $enumField,
                    $value
                )
            )
        );
    }

    protected function getOperator(): string
    {
        return 'has';
    }
}
