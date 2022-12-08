<?php

namespace App\Day4;

use App\Puzzle as AppPuzzle;
use Exception;
use RuntimeException;

final class Puzzle extends AppPuzzle
{
    public function solve01(): int
    {
        $fullyContains = 0;

        foreach ($this->lines as $line) {
            $matches = $this->parseLine($line);
            if (
                $matches[1] <= $matches[3] &&
                $matches[2] >= $matches[4]
            ) {
                $fullyContains++;
                continue;
            }

            if (
                $matches[3] <= $matches[1] &&
                $matches[4] >= $matches[2]
            ) {
                $fullyContains++;
                continue;
            }
        }

        return $fullyContains;
    }

    public function solve02(): int
    {
        $overlaps = 0;

        foreach ($this->lines as $line) {
            $matches = $this->parseLine($line);
            if ($this->isBetween(
                $matches[1],
                $matches[3],
                $matches[4]
            )) {
                $overlaps++;
                continue;
            }
            if ($this->isBetween(
                $matches[2],
                $matches[3],
                $matches[4]
            )) {
                $overlaps++;
                continue;
            }
            if ($this->isBetween(
                $matches[3],
                $matches[1],
                $matches[2]
            )) {
                $overlaps++;
                continue;
            }
            if ($this->isBetween(
                $matches[4],
                $matches[1],
                $matches[2]
            )) {
                $overlaps++;
                continue;
            }
        }

        return $overlaps;
    }

    private function isBetween(
        int $target,
        int $min,
        int $max
    ): bool {
        if ($min > $max) {
            throw new RuntimeException(
                "Invalid min and max: {$min} and {$max}"
            );
        }

        return ($target >= $min && $target <= $max);
    }

    private function parseLine(string $line): array
    {
        preg_match(
            '@(\d+)-(\d+),(\d+)-(\d+)@',
            $line,
            $matches
        );
        if (count($matches) !== 5) {
            throw new Exception(
                'Something unexpected: ' . $line
            );
        }
        return $matches;
    }
}
