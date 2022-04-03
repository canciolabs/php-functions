<?php

namespace CancioLabs\Functions\Tests\ConverterFunctions\Time;

use InvalidArgumentException;
use function CancioLabs\Functions\ConverterFunctions\Time\quarter_to_second;

class QuarterToSecondTest extends TimeTestCase
{

    public function validTimeDataProvider(): array
    {
        $numbers = [];

        $numbers[] = [-1.5, -15552000.0];
        $numbers[] = [-1, -10368000];
        $numbers[] = [0, 0];
        $numbers[] = [1, 10368000];
        $numbers[] = [1.5, 15552000.0];
        $numbers[] = [4, 41472000];

        return $numbers;
    }

    /**
     * @test
     * @dataProvider invalidTimeDataTypeDataProvider
     */
    public function shouldThrowExceptionWhenTimeIsNotNumeric($invalid_time): void
    {
        $this->expectException(InvalidArgumentException::class);

        quarter_to_second($invalid_time);
    }

    /**
     * @test
     * @dataProvider validTimeDataProvider
     */
    public function shouldConvertWhenTimeIsValid($weeks, $seconds): void
    {
        $this->assertSame($seconds, quarter_to_second($weeks));
    }

}