<?php

namespace App\Day1;

class Puzzle
{
    public function solve01(string $filePath): int
    {
        $partialSum = 0;
        $winner = 0;

        $stream = fopen($filePath, 'r');
        while ($line = fgets($stream)) {
            if ($line === PHP_EOL) {
                if ($winner < $partialSum) {
                    $winner = $partialSum;
                }
                $partialSum = 0;
            } else {
                $partialSum += (int)$line;
            }
        }
        fclose($stream);

        return $winner;
    }

    public function solve02(string $filePath): int
    {
        $partialSums = [];
        $i = 0;
        $partialSums[$i] = 0;

        $stream = fopen($filePath, 'r');
        while ($line = fgets($stream)) {
            if ($line === PHP_EOL) {
                $i++;
                $partialSums[$i] = 0;
            } else {
                $partialSums[$i] += (int)$line;
            }
        }
        fclose($stream);
        sort($partialSums);
        $count = count($partialSums);

        return $partialSums[$count - 1] + $partialSums[$count - 2] + $partialSums[$count - 3];
    }
}
