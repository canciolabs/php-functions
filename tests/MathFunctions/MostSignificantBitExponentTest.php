<?php

namespace CancioLabs\Functions\Tests\MathFunctions;

use CancioLabs\Functions\Tests\CustomTestCase;
use InvalidArgumentException;
use function CancioLabs\Functions\MathFunctions\most_significant_bit_exponent;

class MostSignificantBitExponentTest extends CustomTestCase
{

    public function negativeIntegerDataProvider(): array
    {
        $numbers = [];
        $numbers[] = [-1];

        for ($i = 1; $i <= 5; $i++) {
            $numbers[] = [self::faker()->numberBetween(1) * -1];
        }

        return $numbers;
    }

    public function nonNegativeIntegerDataProvider(): array
    {
        $numbers = [];

        $numbers[] = [0, 0];
        $numbers[] = [1, 0];
        $numbers[] = [2, 1];
        $numbers[] = [3, 1];
        $numbers[] = [4, 2];
        $numbers[] = [5, 2];
        $numbers[] = [6, 2];
        $numbers[] = [7, 2];
        $numbers[] = [8, 3];
        $numbers[] = [9, 3];
        $numbers[] = [10, 3];
        $numbers[] = [11, 3];
        $numbers[] = [12, 3];
        $numbers[] = [14, 3];
        $numbers[] = [15, 3];
        $numbers[] = [16, 4];
        $numbers[] = [17, 4];

        return $numbers;
    }

    /**
     * @test
     * @dataProvider negativeIntegerDataProvider
     */
    public function shouldReturnFalseForNegativeNumbers(int $n): void
    {
        $this->expectException(InvalidArgumentException::class);

        most_significant_bit_exponent($n);
    }

    /**
     * @test
     * @dataProvider nonNegativeIntegerDataProvider
     */
    public function shouldReturnTrueForPrimeNumbers(int $n, int $exponent): void
    {
        $this->assertSame($exponent, most_significant_bit_exponent($n));
    }

}