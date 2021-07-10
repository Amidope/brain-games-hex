<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function greeting(): string
{
    line('Welcome to the Brain Game!');
    $playerName = prompt('May I have your name?');
    line("Hello, %s!", $playerName);
    return $playerName;
}

function getPlayersAnswer(string $question): string
{
    line("Question: {$question}");
    $playerAnswer = prompt('Your answer');
    return $playerAnswer;
}

function concratulations(int $numberOfQuestions, string $playerName): void
{
    if ($numberOfQuestions == 3) {
        line("Congratulations, {$playerName}!");
    }
}

function isCorrect(string $playerAnswer, string $correctAnswer): bool
{
    if ($playerAnswer == $correctAnswer) {
        return true;
    } else {
        return false;
    }
}

function resultArrayCalc(int $firstNumber, int $secondNumber): array
{

    $keysOfResultArr = ["correctAnswer", "expression"];
    $operators = ['add', 'subtract', 'multiply'];
    $randomOperator = array_rand(array_flip($operators));
    $resultWithoutKeys = [];
    switch ($randomOperator) {
        case 'add':
            $resultWithoutKeys = [$firstNumber + $secondNumber, "$firstNumber + $secondNumber"];
            break;

        case 'subtract':
            $resultWithoutKeys = [$firstNumber - $secondNumber, "$firstNumber - $secondNumber"];
            break;

        case 'multiply':
            $resultWithoutKeys = [$firstNumber * $secondNumber, "$firstNumber * $secondNumber"];
            break;
    }

    $resultArr = array_combine($keysOfResultArr, $resultWithoutKeys);

    return $resultArr;
}

function gcd(int $a, int $b): int
{
    if ($a == 0 || $b == 0) {
        return abs(max(abs($a), abs($b)));
    }
    $r = $a % $b;
    return ($r != 0) ? gcd($b, $r) : abs($b);
}

function progression(): array
{
    $progressionLength = rand(5, 10);
    $startNumber = rand(1, 100);
    $addition = rand(2, 5);
    $nextNumber = 0;

    $progressionArr = range($startNumber, $startNumber + $progressionLength * $addition, $addition);

    $answerKey = array_rand($progressionArr);
    $correctAnswer = $progressionArr[$answerKey];
    $expression = "";
    $progressionArr[$answerKey] = "..";

    foreach ($progressionArr as $value) {
        $expression = implode(" ", $progressionArr);
    }
    return $progressionResult = [$expression, $correctAnswer];
}

function getPrimeAnswer(int $number): string
{

    $isPrime = function ($number): bool {
        if ($number < 2) {
            return false;
        }
        for ($i = 2; $i < $number; $i++) {
            if ($number % $i === 0) {
                return false;
            }
        }
        return true;
    };

    if ($isPrime($number)) {
        return "yes";
    } else {
        return "no";
    }
}
