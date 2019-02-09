<?php

declare(strict_types=1);

namespace Yodata\Query\Filter\Value;

use Yodata\Query\Filter\Value\ValueInterface;

class IntValue implements ValueInterface
{
    /**
     * @var integer
     */
    private $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function __toString(): string
    {
        return sprintf("%d", $this->value);
    }
}
