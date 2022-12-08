<?php

namespace Test\Day4;

use App\Day4\Puzzle;
use App\FileReader;
use PHPUnit\Framework\TestCase;

class PuzzleTest extends TestCase
{
    private Puzzle $puzzle;

    public function setUp(): void
    {
        $this->puzzle = new Puzzle(
            new FileReader(
                __DIR__ . '/../assets/day4/data.txt'
            )
        );
    }

    public function testSolveOne(): void
    {
        $result = $this->puzzle->solve01();
        self::assertEquals(2, $result);
    }

    public function testSolveTwo(): void
    {
        $result = $this->puzzle->solve02();
        self::assertEquals(4, $result);
    }
}
