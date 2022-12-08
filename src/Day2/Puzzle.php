<?php

namespace App\Day2;

class Puzzle
{
    private const LOOSE = 'X';
    private const DRAW = 'Y';
    private const WIN = 'Z';

    private const ROCK = 'A';
    private const PAPER = 'B';
    private const SCISSOR = 'C';

    public function solve01(string $input): int
    {
        $points = 0;

        $stream = fopen($input, 'r');
        while ($line = fgets($stream)) {
            $myChoice = $this->normalizeMyChoice($line[2]);
            $points += $this->calculateByChoose(
                $myChoice
            );

            $points += $this->calculateByWin(
                $line[0],
                $myChoice,
            );
        }
        fclose($stream);

        return $points;
    }

    public function solve02(string $input): int
    {
        $points = 0;

        $stream = fopen($input, 'r');
        while ($line = fgets($stream)) {
            $myChoice = $this->calculateMyChoice(
                $line[0],
                $line[2]
            );
            $points += $this->calculateByChoose(
                $myChoice
            );

            $points += $this->calculateByWin(
                $line[0],
                $myChoice,
            );
        }
        fclose($stream);

        return $points;
    }

    private function normalizeMyChoice(string $myChoice): string
    {
        return match ($myChoice) {
            'X' => self::ROCK,
            'Y' => self::PAPER,
            'Z' => self::SCISSOR,
        };
    }

    private function calculateByChoose(
        string $symbol
    ): int {
        return match ($symbol) {
            self::ROCK => 1,
            self::PAPER => 2,
            self::SCISSOR => 3,
        };
    }

    private function calculateByWin(
        string $oponent,
        string $mine
    ): int {
        return match (true) {
            $oponent === $mine => 3,
            $oponent === self::ROCK && $mine === self::PAPER => 6,
            $oponent === self::PAPER && $mine === self::SCISSOR => 6,
            $oponent === self::SCISSOR && $mine === self::ROCK => 6,
            $oponent === self::ROCK && $mine === self::SCISSOR => 0,
            $oponent === self::PAPER && $mine === self::ROCK => 0,
            $oponent === self::SCISSOR && $mine === self::PAPER => 0,
        };
    }

    private function calculateMyChoice(string $oponent, string $result)
    {
        return match (true) {
            $oponent === self::ROCK && $result === self::LOOSE => self::SCISSOR,
            $oponent === self::ROCK && $result === self::DRAW => self::ROCK,
            $oponent === self::ROCK && $result === self::WIN => self::PAPER,
            $oponent === self::PAPER && $result === self::LOOSE => self::ROCK,
            $oponent === self::PAPER && $result === self::DRAW => self::PAPER,
            $oponent === self::PAPER && $result === self::WIN => self::SCISSOR,
            $oponent === self::SCISSOR && $result === self::LOOSE => self::PAPER,
            $oponent === self::SCISSOR && $result === self::DRAW => self::SCISSOR,
            $oponent === self::SCISSOR && $result === self::WIN => self::ROCK,
        };
    }
}
