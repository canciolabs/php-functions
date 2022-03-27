<?php

namespace CancioLabs\Functions\Tests\ConverterFunctions\Temperature;

use InvalidArgumentException;
use function CancioLabs\Functions\ConverterFunctions\Temperature\celsius_to_fahrenheit;

class CelsiusToFahrenheitTest extends TemperatureTestCase
{

    public function validTemperatureDataProvider(): array
    {
        $numbers = [];

        // Min
        $numbers[] = [-273.15, -459.67];

        // Int
        $numbers[] = [0, 32.0];
        $numbers[] = [21, 69.8];
        $numbers[] = [37, 98.6];
        $numbers[] = [100, 212.0];

        // Numeric string
        $numbers[] = ['72.89', 163.20];
        $numbers[] = ['72.89', 163.202, 3];

        return $numbers;
    }

    /**
     * @test
     * @dataProvider invalidTemperatureDataTypeDataProvider
     */
    public function shouldThrowExceptionWhenTemperatureIsNotNumeric($invalid_temperature): void
    {
        $this->expectException(InvalidArgumentException::class);

        celsius_to_fahrenheit($invalid_temperature);
    }

    /**
     * @test
     * @dataProvider invalidCelsiusDataProvider
     */
    public function shouldThrowExceptionWhenTemperatureIsInvalid($invalid_temperature): void
    {
        $this->expectException(InvalidArgumentException::class);

        celsius_to_fahrenheit($invalid_temperature);
    }

    /**
     * @test
     * @dataProvider validTemperatureDataProvider
     */
    public function shouldConvertWhenTemperatureIsValid($celsius, $fahrenheit, int $precision = 2): void
    {
        $this->assertSame($fahrenheit, celsius_to_fahrenheit($celsius, $precision));
    }

}