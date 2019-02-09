<?php

declare(strict_types=1);

namespace Yodata\Query\Filter;

class NotExpression extends Expression
{
    public function __toString(): string
    {
        return sprintf(
            'not %s %s%s',
            $this->field,
            $this->operator,
            (string) $this->nextSibling
        );
    }
}
