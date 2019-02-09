<?php

declare(strict_types=1);

namespace Yodata\Query\Filter\Value;

class Literal implements ValueInterface
{
    /**
     * @var mixed
     */
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function __toString(): string
    {
        return sprintf('%s', $this->value);
    }
}