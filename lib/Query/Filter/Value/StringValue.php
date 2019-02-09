<?php

declare(strict_types=1);

namespace Yodata\Query\Filter\Value;

class StringValue implements ValueInterface
{
    /**
     * @var string
     */
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function __toString(): string
    {
        return sprintf("'%s'", $this->value);
    }
}
