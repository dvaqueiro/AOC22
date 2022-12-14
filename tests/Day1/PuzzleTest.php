<?php

namespace Test\Day1;

use App\Day1\Puzzle;
use App\FileReader;
use PHPUnit\Framework\TestCase;

class PuzzleTest extends TestCase
{
    private Puzzle $puzzle;

    public function setUp(): void
    {
        $this->puzzle = new Puzzle(
            new FileReader(
                __DIR__ . '/../assets/day1/example.txt'
            )
        );
    }

    public function testPuzzleOne(): void
    {
        $result = $this->puzzle->solve01();
        self::assertEquals(24000, $result);
    }

    public function testPuzzleTwo(): void
    {
        $result = $this->puzzle->solve02();
        self::assertEquals(45000, $result);
    }
}
