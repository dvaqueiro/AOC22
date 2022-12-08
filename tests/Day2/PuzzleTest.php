<?php

namespace Test\Day2;

use App\Day2\Puzzle;
use PHPUnit\Framework\TestCase;

class PuzzleTest extends TestCase
{
    public function testPuzzleOne(): void
    {
        $puzzleOne = new Puzzle();
        $result = $puzzleOne->solve01(
            __DIR__ . '/../assets/day2/example.txt'
        );

        self::assertEquals(15, $result);
    }

    public function testPuzzleTwo(): void
    {
        $puzzleOne = new Puzzle();
        $result = $puzzleOne->solve02(
            __DIR__ . '/../assets/day2/example.txt'
        );

        self::assertEquals(12, $result);
    }
}
