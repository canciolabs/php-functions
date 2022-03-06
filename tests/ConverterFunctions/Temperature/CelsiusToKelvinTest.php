<?php

namespace CancioLabs\Functions\Tests\ConverterFunctions\Temperature;

use InvalidArgumentException;
use function CancioLabs\Functions\ConverterFunctions\Temperature\celsius_to_kelvin;

class CelsiusToKelvinTest extends TemperatureTestCase
{

    public function temperatureDataProvider(): array
    {
        $numbers = [];

        // Min
        $numbers[] = [-273.16, 0.0];
        $numbers[] = [-273.151, 0.0];
        $numbers[] = [-273.15, 0.0];

        // Int
        $numbers[] = [0, 273.15];
        $numbers[] = [21, 294.15];
        $numbers[] = [37, 310.15];
        $numbers[] = [100, 373.15];

        // Numeric string
        $numbers[] = ['72.89', 346.04];

        return $numbers;
    }

    /**
     * @test
     * @dataProvider invalidTemperatureDataProvider
     */
    public function shouldThrowExceptionWhenTemperatureIsNotNumeric($invalid_temperature): void
    {
        $this->expectException(InvalidArgumentException::class);

        celsius_to_kelvin($invalid_temperature);
    }

    /**
     * @test
     * @dataProvider temperatureDataProvider
     */
    public function shouldReturnExpectedKelvin($celsius, $kelvin): void
    {
        $this->assertSame($kelvin, celsius_to_kelvin($celsius));
    }

}