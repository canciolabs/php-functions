<?php

namespace CancioLabs\Functions\Tests\ConverterFunctions\Time;

use InvalidArgumentException;
use function CancioLabs\Functions\ConverterFunctions\Time\month_to_second;

class MonthToSecondTest extends TimeTestCase
{

    public function validTimeDataProvider(): array
    {
        $numbers = [];

        $numbers[] = [-1.5, -3888000.0];
        $numbers[] = [-1, -2592000];
        $numbers[] = [0, 0];
        $numbers[] = [1, 2592000];
        $numbers[] = [1.5, 3888000.0];
        $numbers[] = [12, 31104000];

        return $numbers;
    }

    /**
     * @test
     * @dataProvider invalidTimeDataTypeDataProvider
     */
    public function shouldThrowExceptionWhenTimeIsNotNumeric($invalid_time): void
    {
        $this->expectException(InvalidArgumentException::class);

        month_to_second($invalid_time);
    }

    /**
     * @test
     * @dataProvider validTimeDataProvider
     */
    public function shouldConvertWhenTimeIsValid($months, $seconds): void
    {
        $this->assertSame($seconds, month_to_second($months));
    }

}