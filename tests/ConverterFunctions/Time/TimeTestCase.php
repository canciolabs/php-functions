<?php

namespace CancioLabs\Functions\Tests\ConverterFunctions\Time;

use CancioLabs\Functions\Tests\CustomTestCase;
use DateTime;

abstract class TimeTestCase extends CustomTestCase
{

    abstract public function validTimeDataProvider(): array;

    public function invalidTimeDataTypeDataProvider(): array
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