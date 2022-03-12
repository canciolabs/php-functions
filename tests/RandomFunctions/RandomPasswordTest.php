<?php

namespace CancioLabs\Functions\Tests\RandomFunctions;

use CancioLabs\Functions\Tests\CustomTestCase;
use InvalidArgumentException;
use function CancioLabs\Functions\RandomFunctions\random_password;

class RandomPasswordTest extends CustomTestCase
{

    public function invalidLengthDataProvider(): array
    {
        return [
            [-1],
            [0],
            [7],
        ];
    }

    public function validLengthDataProvider(): array
    {
        return [
            [16],
            [32],
            [128],
        ];
    }

    /**
     * @test
     * @dataProvider invalidLengthDataProvider
     */
    public function shouldThrowExceptionWhenLengthArgIsInvalid(int $length): void
    {
        $this->expectException(InvalidArgumentException::class);

        random_password($length);
    }

    /**
     * @test
     */
    public function shouldThrowExceptionWhenAllOptionsAreFalse(): void
    {
        $this->expectException(InvalidArgumentException::class);

        random_password(16, false, false, false, false);
    }

    /**
     * @test
     * @dataProvider validLengthDataProvider
     */
    public function shouldReturnPasswordWhenLengthArgIsValid(int $length): void
    {
        $password = random_password($length);

        $this->assertSame($length, strlen($password));
    }

    /**
     * @test
     */
    public function shouldReturnPasswordThatContainsOnlySymbols(): void
    {
        $password = random_password(16, true, false, false, false);

        for ($i = 0; $i < 16; $i++) {
            $this->assertStringContainsString($password[$i], CL_RANDOM_SYMBOLS);
        }
    }

    /**
     * @test
     */
    public function shouldReturnPasswordThatContainsOnlyNumbers(): void
    {
        $password = random_password(16, false, true, false, false);

        for ($i = 0; $i < 16; $i++) {
            $this->assertStringContainsString($password[$i], CL_RANDOM_NUMBERS);
        }
    }

    /**
     * @test
     */
    public function shouldReturnPasswordThatContainsOnlyLowerCaseLetters(): void
    {
        $password = random_password(16, false, false, true, false);

        for ($i = 0; $i < 16; $i++) {
            $this->assertStringContainsString($password[$i], CL_RANDOM_LOWERCASE_LETTERS);
        }
    }

    /**
     * @test
     */
    public function shouldReturnPasswordThatContainsOnlyUpperCaseLetters(): void
    {
        $password = random_password(16, false, false, false, true);

        for ($i = 0; $i < 16; $i++) {
            $this->assertStringContainsString($password[$i], CL_RANDOM_UPPERCASE_LETTERS);
        }
    }

}