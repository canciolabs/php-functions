<?php

namespace CancioLabs\Functions\Tests\UtilityFunctions;

use CancioLabs\Functions\Tests\CustomTestCase;
use DateTime;
use DateTimeImmutable;
use function CancioLabs\Functions\UtilityFunctions\swap;

class SwapTest extends CustomTestCase
{

    public function variablesDataProvider(): array
    {
        $vars = [];

        $vars[] = ['', null];
        $vars[] = [1, 2];
        $vars[] = ['foo', 'bar'];
        $vars[] = [['apple', 'banana'], ['Rio', 'New York']];
        $vars[] = [new DateTime('now'), new DateTimeImmutable('tomorrow')];

        return $vars;
    }

    /**
     * @test
     * @dataProvider variablesDataProvider
     */
    public function shouldSwapVariables($a, $b): void
    {
        $c = $a;
        $d = $b;

        swap($a, $b);

        $this->assertSame($c, $b);
        $this->assertSame($d, $a);
    }

}