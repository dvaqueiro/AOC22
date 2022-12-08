<?php

namespace App;

abstract class Puzzle
{
    private readonly FileReader $fileReader;
    protected readonly array $lines;

    public function __construct(
        FileReader $fileReader
    ) {
        $this->fileReader = $fileReader;
        $this->lines = $this->fileReader->getFileLines();
    }

    public abstract function solve01(): int;
    public abstract function solve02(): int;
}
