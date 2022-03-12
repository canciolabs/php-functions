<?php

namespace CancioLabs\Functions\Tests\StringFunctions;

use CancioLabs\Functions\Tests\CustomTestCase;
use function CancioLabs\Functions\StringFunctions\remove_extra_parenthesis;

class RemoveExtraParenthesisTest extends CustomTestCase
{

    public function stringDataProvider(): array
    {
        $expressions = [];

        $expressions[] = ['', ''];
        $expressions[] = ['()', '()'];
        $expressions[] = ['(())', '()'];
        $expressions[] = ['1', '1'];
        $expressions[] = ['(1)', '(1)'];
        $expressions[] = ['((1))', '(1)'];
        $expressions[] = ['1+2', '1+2'];
        $expressions[] = ['(1+2)', '(1+2)'];
        $expressions[] = ['((1+2))', '(1+2)'];
        $expressions[] = ['3-2+1', '3-2+1'];
        $expressions[] = ['3-(2+1)', '3-(2+1)'];
        $expressions[] = ['3-((2+1))', '3-(2+1)'];
        $expressions[] = ['(3-2)+1', '(3-2)+1'];
        $expressions[] = ['((3-2))+1', '(3-2)+1'];
        $expressions[] = ['((3-2)+1)', '((3-2)+1)'];
        $expressions[] = ['(1+2)/(3+4)', '(1+2)/(3+4)'];
        $expressions[] = ['((1+2))/((3+4))', '(1+2)/(3+4)'];
        $expressions[] = ['((((1+2)))/((((3+4)))))', '(1+2)/(3+4)'];
        $expressions[] = ['((1+2)+3)+4', '((1+2)+3)+4'];
        $expressions[] = ['((1+2)+3)+4', '((1+2)+3)+4'];

        return $expressions;
    }

    /**
     * @test
     * @dataProvider stringDataProvider
     */
    public function shouldRemoveExtraParenthesis(string $string, string $expected): void
    {
        $this->assertSame($expected, remove_extra_parenthesis($string));
    }

}