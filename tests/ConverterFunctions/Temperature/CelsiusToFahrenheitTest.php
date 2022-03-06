<?php

namespace CancioLabs\Functions\Tests\ConverterFunctions\Temperature;

use InvalidArgumentException;
use function CancioLabs\Functions\ConverterFunctions\Temperature\celsius_to_fahrenheit;

class CelsiusToFahrenheitTest extends TemperatureTestCase
{

    public function temperatureDataProvider(): array
    {
        $numbers = [];

        // Min
        $numbers[] = [-273.16, -459.67];
        $numbers[] = [-273.151, -459.67];
        $numbers[] = [-273.15, -459.67];

        // Int
        $numbers[] = [0, 32.0];
        $numbers[] = [21, 69.8];
        $numbers[] = [37, 98.6];
        $numbers[] = [100, 212.0];

        // Numeric string
        $numbers[] = ['72.89', 163.202];

        return $numbers;
    }

    /**
     * @test
     * @dataProvider invalidTemperatureDataProvider
     */
    public function shouldThrowExceptionWhenTemperatureIsNotNumeric($invalid_temperature): void
    {
        $this->expectException(InvalidArgumentException::class);

        celsius_to_fahrenheit($invalid_temperature);
    }

    /**
     * @test
     * @dataProvider temperatureDataProvider
     */
    public function shouldReturnExpectedFahrenheit($celsius, $fahrenheit): void
    {
        $this->assertSame($fahrenheit, celsius_to_fahrenheit($celsius));
    }

}