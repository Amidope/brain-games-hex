<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function greeting()
{
    line('Welcome to the Brain Game!');
    $playerName = prompt('May I have your name?');
    line("Hello, %s!", $playerName);
    return $playerName;
}

function question($question)
{
    line("Question: {$question}");
    $playerAnswer = prompt('Your answer');
    return $playerAnswer;
}

function concratulations($numberOfQuestions, $playerName)
{
    if ($numberOfQuestions == 3) {
        line("Congratulations, {$playerName}!");
    }
}

function answerCheck($playerAnswer, $correctAnswer, $playerName)
{
    if ($playerAnswer == $correctAnswer) {
        line('Correct!');
    } else {
        line("'{$playerAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
        line("Let's try again, $playerName");
        return true;
    }
}
