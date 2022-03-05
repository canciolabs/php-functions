<?php

namespace CancioLabs\Functions\Tests\MathFunctions;

use CancioLabs\Functions\Tests\CustomTestCase;
use function CancioLabs\Functions\MathFunctions\is_prime;

class IsPrimeTest extends CustomTestCase
{

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
     */
    public function shouldReturnFalseForNegativeNumbers(): void
    {
        $faker = self::faker();

        for ($i = 1; $i <= 5; $i++) {
            $this->assertFalse(is_prime($faker->numberBetween(-10000, -1)));
        }
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
     */
    public function shouldReturnFalseForEvenNumbersGreaterThanTwo(): void
    {
        $faker = self::faker();

        for ($i = 1, $nb_tests = 1; $nb_tests <= 5; $i++) {
            $number = $faker->numberBetween(4, 10000);

            if ($number % 2 === 0) {
                $this->assertFalse(is_prime($number));
                $nb_tests++;
            }
        }
    }

    /**
     * @test
     */
    public function shouldReturnFalseForOddAndNonPrimeNumbers(): void
    {
        // Some odd numbers
        $odd_numbers = [9, 15, 27, 105, 111, 115, 1007, 1023, 1027, 7881, 7905, 7909];
        foreach ($odd_numbers as $odd_number) {
            $this->assertFalse(is_prime($odd_number));
        }
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