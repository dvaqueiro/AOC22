<?php

namespace App;

class FileReader
{
    public function __construct(
        public readonly string $filePath
    ) {
    }

    public function getFileLines(): array
    {
        $input = file_get_contents($this->filePath);
        return explode(PHP_EOL, rtrim($input));
    }
}
