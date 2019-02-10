<?php

declare(strict_types=1);

namespace Yodata\Query\Filter\Value;

class DateTimeValue implements ValueInterface
{
    /**
     * @var \DateTimeInterface
     */
    private $value;

    public function __construct(\DateTimeInterface $dateTime)
    {
        $this->value = $dateTime;
    }

    public function __toString(): string
    {
        return $this->value->format(\DateTimeInterface::ATOM);
    }
}
