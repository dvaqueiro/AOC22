<?php

namespace Test\Day3;

use App\Day3\Puzzle;
use PHPUnit\Framework\TestCase;

class PuzzleTest extends TestCase
{
    public function testPuzzleOne(): void
    {
        $puzzleOne = new Puzzle();
        $result = $puzzleOne->solve01(
            __DIR__ . '/../assets/day3/example.txt'
        );

        self::assertEquals(157, $result);
    }

    public function testPuzzleTwo(): void
    {
        $puzzleOne = new Puzzle();
        $result = $puzzleOne->solve02(
            __DIR__ . '/../assets/day3/example.txt'
        );

        self::assertEquals(70, $result);
    }
}
