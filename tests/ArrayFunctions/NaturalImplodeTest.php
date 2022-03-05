<?php

namespace CancioLabs\Functions\Tests\ArrayFunctions;

use CancioLabs\Functions\Tests\CustomTestCase;
use InvalidArgumentException;
use function CancioLabs\Functions\ArrayFunctions\natural_implode;

class NaturalImplodeTest extends CustomTestCase
{

    /**
     * @test
     */
    public function shouldReturnEmptyStringWhenArrayIsEmpty(): void
    {
        natural_implode([]);
        $this->expectException(InvalidArgumentException::class);

        natural_implode([null]);
        $this->expectException(InvalidArgumentException::class);

        natural_implode(['']);
        $this->expectException(InvalidArgumentException::class);

        natural_implode([1]);
        $this->expectException(InvalidArgumentException::class);
    }

    /**
     * @test
     */
    public function shouldReturnElementValueWhenArrayHasOneElement(): void
    {
        $str = natural_implode(['1']);
        $this->assertSame('1', $str);

        $str = natural_implode(['foo']);
        $this->assertSame('foo', $str);

        $str = natural_implode([1 => 'bar']);
        $this->assertSame('bar', $str);

        $str = natural_implode(['foo' => 'zoo']);
        $this->assertSame('zoo', $str);
    }

    /**
     * @test
     */
    public function shouldImplodeStringWhenArrayHasMultipleElements(): void
    {
        $str = natural_implode(['foo', 'bar']);
        $this->assertSame('foo and bar', $str);

        $str = natural_implode([1 => 'foo', 2 => 'bar', 3 => 'zoo']);
        $this->assertSame('foo, bar and zoo', $str);

        $str = natural_implode(['foo' => '1', 'bar' => '2', 'zoo' => '3']);
        $this->assertSame('1, 2 and 3', $str);

        $str = natural_implode(['apple', 'banana', 'cashew'], ', ', ' or ');
        $this->assertSame('apple, banana or cashew', $str);

        $str = natural_implode(['Rio', 'New York', 'Jerusalem', 'Sydney'], '... ', '... and ');
        $this->assertSame('Rio... New York... Jerusalem... and Sydney', $str);
    }

}