<?php

namespace CancioLabs\Functions\Tests\UtilityFunctions;

use CancioLabs\Functions\Tests\CustomTestCase;
use function CancioLabs\Functions\UtilityFunctions\swap;

class SwapTest extends CustomTestCase
{

    /**
     * @test
     */
    public function shouldSwapVariables(): void
    {
        $a = '';
        $b = null;
        swap($a, $b);
        $this->assertNull($a);
        $this->assertSame('', $b);

        $a = 1;
        $b = 2;
        swap($a, $b);
        $this->assertSame(2, $a);
        $this->assertSame(1, $b);

        $a = 'foo';
        $b = 'bar';
        swap($a, $b);
        $this->assertSame('bar', $a);
        $this->assertSame('foo', $b);

        $a = ['apple', 'banana'];
        $b = ['Rio', 'New York'];
        swap($a, $b);
        $this->assertSame(['Rio', 'New York'], $a);
        $this->assertSame(['apple', 'banana'], $b);

        $now = new \DateTime('now');
        $tomorrow = new \DateTimeImmutable('tomorrow');
        $a = $now;
        $b = $tomorrow;
        swap($a, $b);
        $this->assertSame($tomorrow, $a);
        $this->assertSame($now, $b);
    }

}