<?php

namespace CancioLabs\Functions\Tests\ConverterFunctions\Temperature;

use InvalidArgumentException;
use function CancioLabs\Functions\ConverterFunctions\Temperature\fahrenheit_to_celsius;
use function CancioLabs\Functions\ConverterFunctions\Temperature\fahrenheit_to_kelvin;

class FahrenheitToCelsiusTest extends TemperatureTestCase
{

    public function validTemperatureDataProvider(): array
    {
        $numbers = [];

        // Min
        $numbers[] = [-459.67, -273.15];

        // Int
        $numbers[] = [32, 0.0];
        $numbers[] = [70, 21.11];
        $numbers[] = [70, 21.111, 3];
        $numbers[] = [98.6, 37.0];
        $numbers[] = [212, 100.0];

        // Numeric string
        $numbers[] = ['163.202', 72.89];

        return $numbers;
    }

    /**
     * @test
     * @dataProvider invalidTemperatureDataTypeDataProvider
     */
    public function shouldThrowExceptionWhenTemperatureIsNotNumeric($invalid_temperature): void
    {
        $this->expectException(InvalidArgumentException::class);

        fahrenheit_to_celsius($invalid_temperature);
    }

    /**
     * @test
     * @dataProvider invalidFahrenheitDataProvider
     */
    public function shouldThrowExceptionWhenTemperatureIsInvalid($invalid_temperature): void
    {
        $this->expectException(InvalidArgumentException::class);

        fahrenheit_to_kelvin($invalid_temperature);
    }

    /**
     * @test
     * @dataProvider validTemperatureDataProvider
     */
    public function shouldConvertWhenTemperatureIsValid($fahrenheit, $celsius, int $precision = 2): void
    {
        $this->assertSame($celsius, fahrenheit_to_celsius($fahrenheit, $precision));
    }

}