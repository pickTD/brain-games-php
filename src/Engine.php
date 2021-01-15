<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const GOAL = 3;

function play(string $instructions, callable $getRound): void
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name", "", "? ");
    line("Hello, %s!", $name);
    line($instructions);
    $answersCount = 0;

    while ($answersCount < GOAL) {
        [$question, $correctAnswer] = $getRound();
        line("Question: %s", $question);
        $answer = prompt("Your answer");
        if ($answer !== $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $name);
            break;
        }
        line("Correct!");
        $answersCount += 1;
    }
    if ($answersCount === GOAL) {
        line("Congratulations, %s!", $name);
    }
}
