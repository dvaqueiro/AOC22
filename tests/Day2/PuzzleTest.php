<?php

namespace Test\Day2;

use App\Day2\Puzzle;
use App\FileReader;
use PHPUnit\Framework\TestCase;

class PuzzleTest extends TestCase
{
    private Puzzle $puzzle;

    public function setUp(): void
    {
        $this->puzzle = new Puzzle(
            new FileReader(
                __DIR__ . '/../assets/day2/example.txt'
            )
        );
    }

    public function testPuzzleOne(): void
    {
        $result = $this->puzzle->solve01();
        self::assertEquals(15, $result);
    }

    public function testPuzzleTwo(): void
    {
        $result = $this->puzzle->solve02();
        self::assertEquals(12, $result);
    }
}
