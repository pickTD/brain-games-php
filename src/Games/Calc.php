<?php

namespace Brain\Games\Games\Calc;

use function Brain\Games\Engine\play;

const MIN = 1;
const MAX = 11;
const OPERATORS = ['+', '-', '*'];
const INSTRUCTIONS = "What is the result of the expression?";

function getQuestion(): array
{
    $a = rand(MIN, MAX);
    $b = rand(MIN, MAX);
    $operator = OPERATORS[array_rand(OPERATORS)];
    return [$a, $operator, $b];
}

function getAnswer(array $question): int
{
    [$a, $operator, $b] = $question;
    $result = 0;
    switch ($operator) {
        case '+':
            $result = $a + $b;
            break;
        case '-':
            $result = $a - $b;
            break;
        case '*':
            $result = $a * $b;
    }
    return $result;
}

function start(): void
{
    $getRound = function (): array {
        $question = getQuestion();
        $questionSting = implode(' ', $question);
        $answer = (string) getAnswer($question);
        return [$questionSting, $answer];
    };
    play(INSTRUCTIONS, $getRound);
}
