<?php

declare(strict_types=1);

namespace Yodata\Query\Filter\Value;

class FloatValue implements ValueInterface
{
    /**
     * @var float
     */
    private $value;

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    public function __toString(): string
    {
        return sprintf("%s", $this->value);
    }
}
