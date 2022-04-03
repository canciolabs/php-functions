<?php

namespace CancioLabs\Functions\Tests\ConverterFunctions\Time;

use InvalidArgumentException;
use function CancioLabs\Functions\ConverterFunctions\Time\week_to_second;

class WeekToSecondTest extends TimeTestCase
{

    public function validTimeDataProvider(): array
    {
        $numbers = [];

        $numbers[] = [-1.5, -907200.0];
        $numbers[] = [-1, -604800];
        $numbers[] = [0, 0];
        $numbers[] = [1, 604800];
        $numbers[] = [1.5, 907200.0];
        $numbers[] = [52, 31449600];

        return $numbers;
    }

    /**
     * @test
     * @dataProvider invalidTimeDataTypeDataProvider
     */
    public function shouldThrowExceptionWhenTimeIsNotNumeric($invalid_time): void
    {
        $this->expectException(InvalidArgumentException::class);

        week_to_second($invalid_time);
    }

    /**
     * @test
     * @dataProvider validTimeDataProvider
     */
    public function shouldConvertWhenTimeIsValid($weeks, $seconds): void
    {
        $this->assertSame($seconds, week_to_second($weeks));
    }

}