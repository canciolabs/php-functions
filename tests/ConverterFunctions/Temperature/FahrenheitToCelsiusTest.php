<?php

namespace CancioLabs\Functions\Tests\ConverterFunctions\Temperature;

use InvalidArgumentException;
use function CancioLabs\Functions\ConverterFunctions\Temperature\fahrenheit_to_celsius;

class FahrenheitToCelsiusTest extends TemperatureTestCase
{

    public function temperatureDataProvider(): array
    {
        $numbers = [];

        // Min
        $numbers[] = [-459.68, -273.15];
        $numbers[] = [-459.671, -273.15];
        $numbers[] = [-459.67, -273.15];

        // Int
        $numbers[] = [32, 0.0];
        $numbers[] = [70, 21.11111111111111];
        $numbers[] = [98.6, 37.0];
        $numbers[] = [212, 100.0];

        // Numeric string
        $numbers[] = ['163.202', 72.89];

        return $numbers;
    }

    /**
     * @test
     * @dataProvider invalidTemperatureDataProvider
     */
    public function shouldThrowExceptionWhenTemperatureIsNotNumeric($invalid_temperature): void
    {
        $this->expectException(InvalidArgumentException::class);

        fahrenheit_to_celsius($invalid_temperature);
    }

    /**
     * @test
     * @dataProvider temperatureDataProvider
     */
    public function shouldReturnExpectedKelvin($fahrenheit, $celsius): void
    {
        $this->assertSame($celsius, fahrenheit_to_celsius($fahrenheit));
    }

}