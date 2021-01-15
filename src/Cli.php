<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

/**
 * Asks for user name and greet user
 *
 * @return void
 */
function acquaintance(): void
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?", false, ' ');
    line("Hello, %s!", $name);
}
