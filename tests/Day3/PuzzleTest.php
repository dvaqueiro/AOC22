<?php

namespace Test\Day3;

use App\Day3\Puzzle;
use App\FileReader;
use PHPUnit\Framework\TestCase;

class PuzzleTest extends TestCase
{
    private Puzzle $puzzle;

    public function setUp(): void
    {
        $this->puzzle = new Puzzle(
            new FileReader(
                __DIR__ . '/../assets/day3/example.txt'
            )
        );
    }

    public function testPuzzleOne(): void
    {
        $result = $this->puzzle->solve01();

        self::assertEquals(157, $result);
    }

    public function testPuzzleTwo(): void
    {
        $result = $this->puzzle->solve02();

        self::assertEquals(70, $result);
    }
}
