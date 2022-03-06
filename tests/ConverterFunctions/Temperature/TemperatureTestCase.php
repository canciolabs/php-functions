<?php

namespace CancioLabs\Functions\Tests\ConverterFunctions\Temperature;

use CancioLabs\Functions\Tests\CustomTestCase;
use DateTime;

class TemperatureTestCase extends CustomTestCase
{

    public function invalidTemperatureDataProvider(): array
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

}