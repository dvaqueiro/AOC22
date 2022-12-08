<?php

namespace App\Day3;

use App\Puzzle as AppPuzzle;

final class Puzzle extends AppPuzzle
{
    private string $priorities = '0abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    public function solve01(): int
    {
        $totalPriority = 0;
        $intersects = [];

        foreach ($this->lines as $line) {
            $lineLength = strlen($line);
            $half = ($lineLength / 2);
            $left = substr($line, 0, $half);
            $right = substr($line, $half, $lineLength);

            $intersects = array_intersect(
                str_split($left),
                str_split($right),
            );
            if (empty($intersects)) {
                continue;
            }
            $totalPriority += strpos(
                $this->priorities,
                array_pop($intersects)
            );
        }

        return $totalPriority;
    }

    public function solve02(): int
    {
        $totalPriority = 0;
        $group = [];
        $rucksacks = 1;
        $intersects = [];

        foreach ($this->lines as $line) {
            $group[] = $line;
            if ($rucksacks % 3 === 0) {
                $intersects = array_intersect(
                    str_split($group[0]),
                    str_split($group[1]),
                    str_split($group[2]),
                );
                $totalPriority += strpos(
                    $this->priorities,
                    array_pop($intersects)
                );
                $group = [];
                $rucksacks = 0;
            }
            $rucksacks++;
        }

        return $totalPriority;
    }
}
