<?php

namespace CancioLabs\Functions\Tests\ConverterFunctions\Temperature;

use CancioLabs\Functions\Tests\CustomTestCase;
use DateTime;

abstract class TemperatureTestCase extends CustomTestCase
{

    abstract public function validTemperatureDataProvider(): array;

    public function invalidTemperatureDataTypeDataProvider(): array
    {
        $numbers = [];

        $numbers[] = [null];
        $numbers[] = [true];
        $numbers[] = [false];
        $numbers[] = [''];
        $numbers[] = ['foo'];
        $numbers[] = [[1]];
        $numbers[] = [new DateTime('now')];

        return $numbers;
    }

    public function invalidCelsiusDataProvider(): array
    {
        $numbers = [];

        // out of domain
        $numbers[] = [-273.16];
        $numbers[] = [-273.151];

        return $numbers;
    }

    public function invalidFahrenheitDataProvider(): array
    {
        $numbers = [];

        // out of domain
        $numbers[] = [-459.68];
        $numbers[] = [-459.671];

        return $numbers;
    }

    public function invalidKelvinDataProvider(): array
    {
        $numbers = [];

        // out of domain
        $numbers[] = [-1];
        $numbers[] = [-0.999];

        return $numbers;
    }

}