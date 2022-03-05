<?php

namespace CancioLabs\Functions\Tests\MathFunctions;

use CancioLabs\Functions\Tests\CustomTestCase;
use function CancioLabs\Functions\MathFunctions\is_prime;

class IsPrimeTest extends CustomTestCase
{

    public function negativeNumbersDataProvider(): array
    {
        $numbers = [];

        $faker = self::faker();
        for ($i = 1; $i <= 5; $i++) {
            $numbers[] = [$faker->numberBetween(-10000, -1)];
        }

        return $numbers;
    }

    public function evenNumbersGreaterThanTwoDataProvider(): array
    {
        $numbers = [];

        $faker = self::faker();
        for ($i = 1, $nb_tests = 1; $nb_tests <= 5; $i++) {
            $number = $faker->numberBetween(4, 10000);

            if ($number % 2 === 0) {
                $numbers[] = [$number];
                $nb_tests++;
            }
        }

        return $numbers;
    }

    public function nonPrimeOddNumbersDataProvider(): array
    {
        $numbers = [];

        $numbers[] = [9];
        $numbers[] = [15];
        $numbers[] = [27];
        $numbers[] = [105];
        $numbers[] = [111];
        $numbers[] = [115];
        $numbers[] = [1007];
        $numbers[] = [1023];
        $numbers[] = [1027];
        $numbers[] = [7881];
        $numbers[] = [7905];
        $numbers[] = [7909];

        return $numbers;
    }

    public function primeNumbersDataProvider(): array
    {
        return [
            [2],
            [3],
            [5],
            [7],
            [11],
            [13],
            [17],
            [19],
            [23],
            [73],
            [79],
            [83],
            [89],
            [97],
            [101],
            [103],
            [107],
            [109],
            [113],
            [971],
            [977],
            [983],
            [991],
            [997],
            [1009],
            [1013],
            [1019],
            [1021],
            [1031],
            [7879],
            [7883],
            [7901],
            [7907],
            [7919],
        ];
    }

    /**
     * @test
     * @dataProvider negativeNumbersDataProvider
     */
    public function shouldReturnFalseForNegativeNumbers(int $number): void
    {
        $this->assertFalse(is_prime($number));
    }

    /**
     * @test
     */
    public function shouldReturnFalseForZero(): void
    {
        $this->assertFalse(is_prime(0));
    }

    /**
     * @test
     */
    public function shouldReturnFalseForOne(): void
    {
        $this->assertFalse(is_prime(1));
    }

    /**
     * @test
     * @dataProvider evenNumbersGreaterThanTwoDataProvider
     */
    public function shouldReturnFalseForEvenNumbersGreaterThanTwo(int $number): void
    {
        $this->assertFalse(is_prime($number));
    }

    /**
     * @test
     * @dataProvider nonPrimeOddNumbersDataProvider
     */
    public function shouldReturnFalseForOddAndNonPrimeNumbers(int $number): void
    {
        $this->assertFalse(is_prime($number));
    }

    /**
     * @test
     * @dataProvider primeNumbersDataProvider
     */
    public function shouldReturnTrueForPrimeNumbers(int $prime_number): void
    {
        $this->assertTrue(is_prime($prime_number));
    }

}