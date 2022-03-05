<?php

namespace CancioLabs\Functions\Tests\MathFunctions;

use CancioLabs\Functions\Tests\CustomTestCase;
use function CancioLabs\Functions\MathFunctions\gcd;

class GcdTest extends CustomTestCase
{

    public function gcdDataProvider(): array
    {
        $numbers = [];

        $numbers[] = [1, 1, 1];
        $numbers[] = [1, 0, 1];
        $numbers[] = [0, 1, 1];
        $numbers[] = [31, 2, 1];
        $numbers[] = [10, 5, 5];
        $numbers[] = [10, 15, 5];
        $numbers[] = [15, 5, 5];
        $numbers[] = [35, 10, 5];
        $numbers[] = [12, 18, 6];

        return $numbers;
    }

    /**
     * @test
     * @dataProvider gcdDataProvider
     */
    public function shouldReturnExpectedGcd(int $a, int $b, int $expected): void
    {
        $this->assertSame($expected, gcd($a, $b));
    }

}