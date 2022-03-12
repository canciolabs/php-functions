<?php

namespace CancioLabs\Functions\Tests\RandomFunctions;

use CancioLabs\Functions\Tests\CustomTestCase;
use InvalidArgumentException;
use function CancioLabs\Functions\RandomFunctions\random_char;

class RandomCharTest extends CustomTestCase
{

    public function validCandidatesDataProvider(): array
    {
        return [
            [CL_RANDOM_SYMBOLS],
            [CL_RANDOM_NUMBERS],
            [CL_RANDOM_LOWERCASE_LETTERS],
            [CL_RANDOM_UPPERCASE_LETTERS],
            [CL_RANDOM_ALPHANUMERIC],
            ['abc123'],
        ];
    }

    /**
     * @test
     */
    public function shouldThrowExceptionWhenCandidatesArgIsEmpty(): void
    {
        $this->expectException(InvalidArgumentException::class);

        random_char('');
    }

    /**
     * @test
     */
    public function shouldReturnCharWhenCalledWithoutArgs(): void
    {
        $char = random_char();

        $this->assertSame(1, strlen($char));
        $this->assertStringContainsString($char, CL_RANDOM_ALPHANUMERIC);
    }

    /**
     * @test
     * @dataProvider validCandidatesDataProvider
     */
    public function shouldReturnCharWhenCalledWithArgs(string $candidates): void
    {
        $char = random_char($candidates);

        $this->assertSame(1, strlen($char));
        $this->assertStringContainsString($char, $candidates);
    }

}