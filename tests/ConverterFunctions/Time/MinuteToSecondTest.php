<?php

namespace CancioLabs\Functions\Tests\ConverterFunctions\Time;

use InvalidArgumentException;
use function CancioLabs\Functions\ConverterFunctions\Time\minute_to_second;

class MinuteToSecondTest extends TimeTestCase
{

    public function validTimeDataProvider(): array
    {
        $numbers = [];

        $numbers[] = [-1.5, -90];
        $numbers[] = [-1, -60];
        $numbers[] = [0, 0];
        $numbers[] = [1, 60];
        $numbers[] = [1.5, 90];
        $numbers[] = [60, 3600];

        return $numbers;
    }

    /**
     * @test
     * @dataProvider invalidTimeDataTypeDataProvider
     */
    public function shouldThrowExceptionWhenTimeIsNotNumeric($invalid_time): void
    {
        $this->expectException(InvalidArgumentException::class);

        minute_to_second($invalid_time);
    }

    /**
     * @test
     * @dataProvider validTimeDataProvider
     */
    public function shouldConvertWhenTimeIsValid($minute, $seconds): void
    {
        $this->assertSame($seconds, minute_to_second($minute));
    }

}