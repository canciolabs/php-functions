<?php

namespace CancioLabs\Functions\Tests\ConverterFunctions\Time;

use InvalidArgumentException;
use function CancioLabs\Functions\ConverterFunctions\Time\hour_to_second;

class HourToSecondTest extends TimeTestCase
{

    public function validTimeDataProvider(): array
    {
        $numbers = [];

        $numbers[] = [-1.5, -5400];
        $numbers[] = [-1, -3600];
        $numbers[] = [0, 0];
        $numbers[] = [1, 3600];
        $numbers[] = [1.5, 5400];
        $numbers[] = [24, 86400];

        return $numbers;
    }

    /**
     * @test
     * @dataProvider invalidTimeDataTypeDataProvider
     */
    public function shouldThrowExceptionWhenTimeIsNotNumeric($invalid_time): void
    {
        $this->expectException(InvalidArgumentException::class);

        hour_to_second($invalid_time);
    }

    /**
     * @test
     * @dataProvider validTimeDataProvider
     */
    public function shouldConvertWhenTimeIsValid($hours, $seconds): void
    {
        $this->assertSame($seconds, hour_to_second($hours));
    }

}