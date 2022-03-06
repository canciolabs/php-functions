<?php

namespace CancioLabs\Functions\Tests\ConverterFunctions\Temperature;

use InvalidArgumentException;
use function CancioLabs\Functions\ConverterFunctions\Temperature\kelvin_to_fahrenheit;

class KelvinToFahrenheitTest extends TemperatureTestCase
{

    public function temperatureDataProvider(): array
    {
        $numbers = [];

        // Min
        $numbers[] = [-1, -459.67];
        $numbers[] = [-0.999, -459.67];
        $numbers[] = [0, -459.67];

        // Int
        $numbers[] = [273.15, 32.0];
        $numbers[] = [294.15, 69.8];
        $numbers[] = [310.15, 98.6];
        $numbers[] = [373.15, 212.0];

        // Numeric string
        $numbers[] = ['200.26', -99.202];

        return $numbers;
    }

    /**
     * @test
     * @dataProvider invalidTemperatureDataProvider
     */
    public function shouldThrowExceptionWhenTemperatureIsNotNumeric($invalid_temperature): void
    {
        $this->expectException(InvalidArgumentException::class);

        kelvin_to_fahrenheit($invalid_temperature);
    }

    /**
     * @test
     * @dataProvider temperatureDataProvider
     */
    public function shouldReturnExpectedKelvin($kelvin, $fahrenheit): void
    {
        $this->assertSame($fahrenheit, kelvin_to_fahrenheit($kelvin));
    }

}