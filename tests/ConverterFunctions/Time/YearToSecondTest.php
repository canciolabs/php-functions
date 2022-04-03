<?php

namespace CancioLabs\Functions\Tests\ConverterFunctions\Time;

use InvalidArgumentException;
use function CancioLabs\Functions\ConverterFunctions\Time\year_to_second;

class YearToSecondTest extends TimeTestCase
{

    public function validTimeDataProvider(): array
    {
        $numbers = [];

        $numbers[] = [-1.5, -47304000.0];
        $numbers[] = [-1, -31536000];
        $numbers[] = [0, 0];
        $numbers[] = [1, 31536000];
        $numbers[] = [1.5, 47304000.0];

        return $numbers;
    }

    /**
     * @test
     * @dataProvider invalidTimeDataTypeDataProvider
     */
    public function shouldThrowExceptionWhenTimeIsNotNumeric($invalid_time): void
    {
        $this->expectException(InvalidArgumentException::class);

        year_to_second($invalid_time);
    }

    /**
     * @test
     * @dataProvider validTimeDataProvider
     */
    public function shouldConvertWhenTimeIsValid($years, $seconds): void
    {
        $this->assertSame($seconds, year_to_second($years));
    }

}