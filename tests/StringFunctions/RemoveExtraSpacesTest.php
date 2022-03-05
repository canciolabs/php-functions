<?php

namespace CancioLabs\Functions\Tests\StringFunctions;

use CancioLabs\Functions\Tests\CustomTestCase;
use function CancioLabs\Functions\StringFunctions\remove_extra_spaces;

class RemoveExtraSpacesTest extends CustomTestCase
{

    public function stringDataProvider(): array
    {
        $vars = [];

        // Empty
        $vars[] = ['', ''];

        // One word
        $vars[] = ['banana', 'banana'];

        // Left
        $vars[] = [' foo', 'foo'];
        $vars[] = ['  foo', 'foo'];

        // Right
        $vars[] = ['bar ', 'bar'];
        $vars[] = ['bar  ', 'bar'];

        // Both
        $vars[] = [' zoo ', 'zoo'];
        $vars[] = ['  zoo  ', 'zoo'];

        // Inside
        $vars[] = ['New  York', 'New York'];
        $vars[] = ['Rio  de Janeiro', 'Rio de Janeiro'];
        $vars[] = ['Rio  de  Janeiro', 'Rio de Janeiro'];

        return $vars;
    }

    /**
     * @test
     * @dataProvider stringDataProvider
     */
    public function shouldRemoveExtraSpaces(string $string, string $expected): void
    {
        $this->assertSame($expected, remove_extra_spaces($string));
    }

}