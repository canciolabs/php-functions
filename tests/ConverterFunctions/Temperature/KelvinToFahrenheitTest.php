<?php

namespace CancioLabs\Functions\Tests\ConverterFunctions\Temperature;

use InvalidArgumentException;
use function CancioLabs\Functions\ConverterFunctions\Temperature\kelvin_to_fahrenheit;

class KelvinToFahrenheitTest extends TemperatureTestCase
{

    public function validTemperatureDataProvider(): array
    {
        $numbers = [];

        // Min
        $numbers[] = [0, -459.67];

        // Int
        $numbers[] = [273.15, 32.0];
        $numbers[] = [294.15, 69.8];
        $numbers[] = [310.15, 98.6];
        $numbers[] = [373.15, 212.0];

        // Numeric string
        $numbers[] = ['200.26', -99.20, 2];
        $numbers[] = ['200.26', -99.202, 3];

        return $numbers;
    }

    /**
     * @test
     * @dataProvider invalidKelvinDataProvider
     */
    public function shouldThrowExceptionWhenTemperatureIsInvalid($invalid_temperature): void
    {
        $this->expectException(InvalidArgumentException::class);

        kelvin_to_fahrenheit($invalid_temperature);
    }

    /**
     * @test
     * @dataProvider validTemperatureDataProvider
     */
    public function shouldConvertWhenTemperatureIsValid($kelvin, $fahrenheit, int $precision = 2): void
    {
        $this->assertSame($fahrenheit, kelvin_to_fahrenheit($kelvin, $precision));
    }

}