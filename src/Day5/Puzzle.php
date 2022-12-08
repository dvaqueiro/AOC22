<?php

namespace App\Day5;

use App\Puzzle as AppPuzzle;
use SplStack;

class Puzzle extends AppPuzzle
{
    private array $stacks = [];

    public function solve01(): string
    {
        return $this->solve($this->moveFromTo());
    }

    public function solve02(): string
    {
        return $this->solve(
            $this->moveFromToImproved()
        );
    }

    private function solve(
        callable $moveFunction
    ): string {
        $result = '';
        $instructions = false;
        $stackLines = [];
        $instructionLines = [];

        foreach ($this->lines as $line) {
            if ($line === '') {
                $instructions = true;
                $this->buildStacks($stackLines);
                continue;
            }
            if (false === $instructions) {
                $stackLines[] = $line;
            } else {
                $instructionLines[] = $line;
            }
        }
        $this->performInstructions(
            $instructionLines,
            $moveFunction
        );

        foreach ($this->stacks as $stack) {
            $result .= $stack->pop();
        }

        return $result;
    }

    private function buildStacks(array $lines): void
    {
        $positions = [];

        $first = true;
        while ($line = array_pop($lines)) {
            $chars = str_split($line);
            if (true === $first) {
                foreach ($chars as $key => $char) {
                    if (' ' !== $char) {
                        $positions[] = $key;
                        $this->stacks[] = new SplStack();
                    }
                }
                $first = false;
                continue;
            }
            foreach ($positions as $key => $position) {
                if (!array_key_exists($position, $chars)) {
                    continue;
                }
                if (' ' === $chars[$position]) {
                    continue;
                }
                $this->stacks[$key]->push($chars[$position]);
            }
        }
    }

    private function performInstructions(
        array $instructions,
        callable $moveFunction
    ): void {
        foreach ($instructions as $ins) {
            preg_match(
                '@move (\d+) from (\d+) to (\d+)@',
                $ins,
                $matches
            );
            $moveFunction(
                (int) $matches[1],
                (int) $matches[2],
                (int) $matches[3],
            );
        }
    }

    private function moveFromTo(): callable
    {
        return function (
            int $count,
            int $from,
            int $to
        ) {
            $fromIdx = $from - 1;
            $toIdx = $to - 1;
            while ($count) {
                $inCharge = $this->stacks[$fromIdx]->pop();
                $this->stacks[$toIdx]->push($inCharge);
                $count--;
            }
        };
    }

    private function moveFromToImproved(): callable
    {
        return function (
            int $count,
            int $from,
            int $to
        ) {
            $fromIdx = $from - 1;
            $toIdx = $to - 1;
            while ($count) {
                $inCharge[] = $this->stacks[$fromIdx]->pop();
                $count--;
            }
            while ($elem = array_pop($inCharge)) {
                $this->stacks[$toIdx]->push($elem);
            }
        };
    }
}
