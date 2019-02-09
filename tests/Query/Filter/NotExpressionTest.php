<?php

declare(strict_types=1);

namespace Yodata\Tests\Query\Filter;

use Yodata\Query\Filter\NotExpression;
use PHPUnit\Framework\TestCase;
use Yodata\Query\Filter\Operator\GreaterThan;
use Yodata\Query\Filter\Value\IntValue;

class NotExpressionTest extends TestCase
{
    /**
     * @test
     */
    public function shouldRenderNegationExpression(): void
    {
        $expression = new NotExpression(
            'ShoeSize',
            new GreaterThan(new IntValue(11))
        );

        static::assertSame(
            'not ShoeSize gt 11',
            $expression->__toString()
        );
    }
}
