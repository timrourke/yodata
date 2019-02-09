<?php

declare(strict_types=1);

namespace Yodata\Query\Filter\Operator;

use Yodata\Query\Filter\Value\ValueInterface;

abstract class AbstractOperator implements OperatorInterface
{
    /**
     * @var \Yodata\Query\Filter\Value\ValueInterface
     */
    protected $value;

    /**
     * The string representation of the operator in the query, eg. 'eq', 'gt',
     * etc.
     *
     * @see https://docs.oasis-open.org/odata/odata/v4.0/errata03/os/complete/part1-protocol/odata-v4.0-errata03-os-part1-protocol-complete.html#_Ref356810738
     * @return string
     */
    abstract protected function getOperator(): string;

    public function __construct(ValueInterface $value)
    {
        $this->value = $value;
    }

    public function __toString(): string
    {
        return sprintf('%s %s', $this->getOperator(), $this->value);
    }
}
