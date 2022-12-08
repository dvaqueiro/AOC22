<?php

namespace App\Day3;

class Puzzle
{
    private string $priorities = '0abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    public function solve01(string $input): int
    {
        $totalPriority = 0;
        $intersects = [];

        $stream = fopen($input, 'r');
        while ($line = fgets($stream)) {
            $line = str_replace("\n", "", $line);
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
        fclose($stream);

        return $totalPriority;
    }

    public function solve02(string $input): int
    {
        $totalPriority = 0;
        $group = [];
        $rucksacks = 1;
        $intersects = [];

        $stream = fopen($input, 'r');
        while ($line = fgets($stream)) {
            $line = str_replace("\n", "", $line);
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
        fclose($stream);

        return $totalPriority;
    }
}
