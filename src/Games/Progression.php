<?php

namespace Brain\Games\Games\Progression;

use function Brain\Games\Engine\play;

const MIN = 5;
const MAX = 10;
const INSTRUCTIONS = "What number is missing in the progression?";

function getProgression(): array
{
    $length = rand(MIN, MAX);
    $base = rand(MIN, MAX);
    $increment = rand(MIN, MAX);
    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $progression[] = $base + ($increment * ($i + 1));
    }
    return $progression;
}

function start(): void
{
    $getRound = function (): array {
        $progression = getProgression();
        $hiddenIdx = array_rand($progression);
        $hiddenElement = $progression[$hiddenIdx];
        $progression[$hiddenIdx] = '..';
        $questionSting = implode(' ', $progression);
        $answer = (string) $hiddenElement;
        return [$questionSting, $answer];
    };
    play(INSTRUCTIONS, $getRound);
}
