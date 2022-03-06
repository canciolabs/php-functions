<?php

namespace CancioLabs\Functions\Tests\ConverterFunctions\Temperature;

use InvalidArgumentException;
use function CancioLabs\Functions\ConverterFunctions\Temperature\fahrenheit_to_kelvin;

class FahrenheitToKelvinTest extends TemperatureTestCase
{

    public function validTemperatureDataProvider(): array
    {
        $numbers = [];

        // Min
        $numbers[] = [-459.67, 0.0];

        // Int
        $numbers[] = [32, 273.15];
        $numbers[] = [70, 294.2611111111];
        $numbers[] = [98.6, 310.15];
        $numbers[] = [212, 373.15];

        // Numeric string
        $numbers[] = ['163.202', 346.04];

        return $numbers;
    }

    /**
     * @test
     * @dataProvider invalidTemperatureDataTypeDataProvider
     */
    public function shouldThrowExceptionWhenTemperatureIsNotNumeric($invalid_temperature): void
    {
        $this->expectException(InvalidArgumentException::class);

        fahrenheit_to_kelvin($invalid_temperature);
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
    public function shouldConvertWhenTemperatureIsValid($fahrenheit, $kelvin): void
    {
        $this->assertSame($kelvin, fahrenheit_to_kelvin($fahrenheit));
    }

}