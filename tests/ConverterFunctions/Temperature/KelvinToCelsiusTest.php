<?php

namespace CancioLabs\Functions\Tests\ConverterFunctions\Temperature;

use InvalidArgumentException;
use function CancioLabs\Functions\ConverterFunctions\Temperature\kelvin_to_celsius;

class KelvinToCelsiusTest extends TemperatureTestCase
{

    public function validTemperatureDataProvider(): array
    {
        $numbers = [];

        // Min
        $numbers[] = [0, -273.15];

        // Int
        $numbers[] = [273.15, 0.0];
        $numbers[] = [294.15, 21.0];
        $numbers[] = [310.15, 37.0];
        $numbers[] = [373.15, 100.0];

        // Numeric string
        $numbers[] = ['200.26', -72.89];
        $numbers[] = ['200.26', -72.89, 3];

        return $numbers;
    }

    /**
     * @test
     * @dataProvider invalidKelvinDataProvider
     */
    public function shouldThrowExceptionWhenTemperatureIsInvalid($invalid_temperature): void
    {
        $this->expectException(InvalidArgumentException::class);

        kelvin_to_celsius($invalid_temperature);
    }

    /**
     * @test
     * @dataProvider validTemperatureDataProvider
     */
    public function shouldConvertWhenTemperatureIsValid($kelvin, $celsius, int $precision = 2): void
    {
        $this->assertSame($celsius, kelvin_to_celsius($kelvin, $precision));
    }

}