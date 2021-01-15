<?php

namespace Brain\Games\Games\Gcd;

use function Brain\Games\Engine\play;

const MIN = 1;
const MAX = 9;
const INSTRUCTIONS = "Find the greatest common divisor of given numbers.";

function getQuestion(): array
{
    $base = rand(MIN, MAX);
    $mul1 = rand(MIN, MAX);
    $mul2 = rand(MIN, MAX);
    $a = $base * $mul1;
    $b = $base * $mul2;
    return [$a, $b];
}

function gcd(int $a, int $b): int
{
    if ($a % $b === 0) {
        return $b;
    }
    return gcd($b, $a % $b);
}

function start(): void
{
    $getRound = function (): array {
        $question = getQuestion();
        $questionSting = implode(' ', $question);
        $answer = (string) gcd(...$question);
        return [$questionSting, $answer];
    };
    play(INSTRUCTIONS, $getRound);
}
