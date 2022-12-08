<?php

namespace App\Day1;

use App\Puzzle as AppPuzzle;

final class Puzzle extends AppPuzzle
{
    public function solve01(): int
    {
        $partialSum = 0;
        $winner = 0;

        foreach ($this->lines as $line) {
            if ($line === '') {
                if ($winner < $partialSum) {
                    $winner = $partialSum;
                }
                $partialSum = 0;
            } else {
                $partialSum += (int)$line;
            }
        }

        return $winner;
    }

    public function solve02(): int
    {
        $partialSums = [];
        $i = 0;
        $partialSums[$i] = 0;

        foreach ($this->lines as $line) {
            if ($line === '') {
                $i++;
                $partialSums[$i] = 0;
            } else {
                $partialSums[$i] += (int)$line;
            }
        }
        sort($partialSums);
        $count = count($partialSums);

        return $partialSums[$count - 1]
            + $partialSums[$count - 2]
            + $partialSums[$count - 3];
    }
}
