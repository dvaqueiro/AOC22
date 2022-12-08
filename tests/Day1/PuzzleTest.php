<?php

namespace Test\Day1;

use App\Day1\Puzzle;
use PHPUnit\Framework\TestCase;

class PuzzleTest extends TestCase
{
    public function testPuzzleOne(): void
    {
        $puzzleOne = new Puzzle();
        $result = $puzzleOne->solve01(
            __DIR__ . '/../assets/day1/example.txt'
        );

        self::assertEquals(24000, $result);
    }

    public function testPuzzleTwo(): void
    {
        $puzzleOne = new Puzzle();
        $result = $puzzleOne->solve02(
            __DIR__ . '/../assets/day1/example.txt'
        );

        self::assertEquals(45000, $result);
    }
}
