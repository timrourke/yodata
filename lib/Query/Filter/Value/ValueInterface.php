<?php

declare(strict_types=1);

namespace Yodata\Query\Filter\Value;

interface ValueInterface
{
    public function __toString(): string;
}