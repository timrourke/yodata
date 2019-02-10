<?php

declare(strict_types=1);

namespace Yodata\Tests;

use Yodata\Query\Filter\Value\FloatValue;
use Yodata\Query\Filter\Value\StringValue;
use Yodata\QueryBuilder;
use PHPUnit\Framework\TestCase;

class QueryBuilderTest extends TestCase
{
    /**
     * @test
     */
    public function shouldBuildSimpleQuery(): void
    {
        $qb = new QueryBuilder();

        $qb->where(
            $qb->groupedExpression(
                $qb->expression(
                    'Foo',
                    $qb->eq(new StringValue('bar'))
                )->and(
                    $qb->expression(
                        'Baz',
                        $qb->le(new FloatValue(23.78))
                    )
                )
            )->orWhere(
                $qb->groupedExpression(
                    $qb->expression(
                        'Shirt',
                        $qb->eq(new StringValue('blue'))
                    )->or(
                        $qb->expression(
                            'Pants',
                            $qb->ne(new StringValue('yellow'))
                        )
                    )
                )
            )
        );

        static::assertSame(
            "(Foo eq 'bar' and Baz le 23.78) or (Shirt eq 'blue' or Pants ne 'yellow')",
            $qb->query()
        );
    }
}
