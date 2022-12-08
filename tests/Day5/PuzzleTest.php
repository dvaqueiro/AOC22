<?php

namespace Test\Day5;

use App\Day5\Puzzle;
use App\FileReader;
use PHPUnit\Framework\TestCase;

class PuzzleTest extends TestCase
{
    private Puzzle $puzzle;

    public function setUp(): void
    {
        $this->puzzle = new Puzzle(
            new FileReader(
                __DIR__ . '/../assets/day5/example.txt'
            )
        );
    }

    public function testSolveOne(): void
    {
        $result = $this->puzzle->solve01();
        self::assertEquals('CMZ', $result);
    }

    public function testSolveTwo(): void
    {
        $result = $this->puzzle->solve02();
        self::assertEquals('MCD', $result);
    }
}
