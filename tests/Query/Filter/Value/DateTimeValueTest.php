<?php

declare(strict_types=1);

namespace Yodata\Tests\Query\Filter\Value;

use PHPUnit\Framework\TestCase;
use Yodata\Query\Filter\Value\DateTimeValue;

class DateTimeValueTest extends TestCase
{
    /**
     * @test
     */
    public function shouldSerializeDateTimeToISO8601(): void
    {
        $dateTime = new \DateTimeImmutable();
        $expectedDateTimeSerialization = $dateTime->format(\DateTimeInterface::ATOM);

        $value = new DateTimeValue($dateTime);

        static::assertSame(
            $expectedDateTimeSerialization,
            $value->__toString()
        );
    }
}
