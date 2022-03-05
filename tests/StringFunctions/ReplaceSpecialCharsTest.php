<?php

namespace CancioLabs\Functions\Tests\StringFunctions;

use CancioLabs\Functions\Tests\CustomTestCase;
use function CancioLabs\Functions\StringFunctions\replace_special_chars;

class ReplaceSpecialCharsTest extends CustomTestCase
{

    public function stringDataProvider(): array
    {
        $vars = [];

        // Empty
        $vars[] = ['', ''];

        // No special chars
        $vars[] = ['ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'];
        $vars[] = ['abcdefghijklmnopqrstuvwxyz', 'abcdefghijklmnopqrstuvwxyz'];
        $vars[] = ['0123456789', '0123456789'];

        // One special chars
        $vars[] = ['Á', 'A'];
        $vars[] = ['À', 'A'];
        $vars[] = ['Ã', 'A'];
        $vars[] = ['Â', 'A'];
        $vars[] = ['Ä', 'A'];
        $vars[] = ['Å', 'A'];
        $vars[] = ['á', 'a'];
        $vars[] = ['à', 'a'];
        $vars[] = ['ã', 'a'];
        $vars[] = ['â', 'a'];
        $vars[] = ['ä', 'a'];
        $vars[] = ['å', 'a'];
        $vars[] = ['ª', 'a'];
        $vars[] = ['Ç', 'C'];
        $vars[] = ['ç', 'c'];
        $vars[] = ['É', 'E'];
        $vars[] = ['È', 'E'];
        $vars[] = ['Ê', 'E'];
        $vars[] = ['Ë', 'E'];
        $vars[] = ['é', 'e'];
        $vars[] = ['è', 'e'];
        $vars[] = ['ê', 'e'];
        $vars[] = ['ë', 'e'];
        $vars[] = ['Í', 'I'];
        $vars[] = ['Ì', 'I'];
        $vars[] = ['Î', 'I'];
        $vars[] = ['Ï', 'I'];
        $vars[] = ['í', 'i'];
        $vars[] = ['ì', 'i'];
        $vars[] = ['î', 'i'];
        $vars[] = ['ï', 'i'];
        $vars[] = ['Ñ', 'N'];
        $vars[] = ['ñ', 'n'];
        $vars[] = ['Ó', 'O'];
        $vars[] = ['Ò', 'O'];
        $vars[] = ['Ô', 'O'];
        $vars[] = ['Õ', 'O'];
        $vars[] = ['Ö', 'O'];
        $vars[] = ['ó', 'o'];
        $vars[] = ['ò', 'o'];
        $vars[] = ['ô', 'o'];
        $vars[] = ['õ', 'o'];
        $vars[] = ['ö', 'o'];
        $vars[] = ['º', 'o'];
        $vars[] = ['°', 'o'];
        $vars[] = ['Ú', 'U'];
        $vars[] = ['Ù', 'U'];
        $vars[] = ['Û', 'U'];
        $vars[] = ['Ü', 'U'];
        $vars[] = ['ú', 'u'];
        $vars[] = ['ù', 'u'];
        $vars[] = ['û', 'u'];
        $vars[] = ['ü', 'u'];
        $vars[] = ['Ý', 'Y'];
        $vars[] = ['ý', 'y'];

        // Multiple special chars
        $vars[] = [
            'ÁÀÃÂÄÅ áàãâäåª Ç ç ÉÈÊË éèêë ÍÌÎÏ íìîï Ñ ñ ÓÒÔÕÖ óòôõöº° ÚÙÛÜ úùûü Ý ý',
            'AAAAAA aaaaaaa C c EEEE eeee IIII iiii N n OOOOO ooooooo UUUU uuuu Y y',
        ];

        return $vars;
    }

    /**
     * @test
     * @dataProvider stringDataProvider
     */
    public function shouldReplaceSpecialChars(string $string, string $expected): void
    {
        $this->assertSame($expected, replace_special_chars($string));
    }

}