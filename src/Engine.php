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

function question(string $question): string
{
    line("Question: {$question}");
    $playerAnswer = prompt('Your answer');
    return $playerAnswer;
}

function concratulations(int $numberOfQuestions, string $playerName): string
{
    if ($numberOfQuestions == 3) {
        line("Congratulations, {$playerName}!");
    }
}

function answerCheck(string $playerAnswer, string $correctAnswer, string $playerName): bool
{
    if ($playerAnswer == $correctAnswer) {
        line('Correct!');
    } else {
        line("'{$playerAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
        line("Let's try again, $playerName!");
        return true;
    }
}

function resultArrayCalc(int $firstNumber, int $secondNumber): array
{
    if (!function_exists('Brain\Games\Engine\add')) {
        function add(int $firstNumber, int $secondNumber): array
        {
            return [$firstNumber + $secondNumber, "$firstNumber + $secondNumber"];
        }
    }

    if (!function_exists('Brain\Games\Engine\subtract')) {
        function subtract(int $firstNumber, int $secondNumber): array
        {
            return [$firstNumber - $secondNumber, "$firstNumber - $secondNumber"];
        }
    }

    if (!function_exists('Brain\Games\Engine\multiply')) {
        function multiply(int $firstNumber, int $secondNumber): array
        {
            return [$firstNumber * $secondNumber, "$firstNumber * $secondNumber"];
        }
    }

    $keysOfResultArr = ["resultValue", "expression"];
    $operators = ["add", "subtract", "multiply"];
    $arrWithoutKeys = call_user_func_array("Brain\Games\Engine\\" .
        $operators[array_rand($operators)], [$firstNumber, $secondNumber]);
    $resultArr = array_combine($keysOfResultArr, $arrWithoutKeys);

    return $resultArr;
}

function gcd(int $a, int $b): int
{
    return ($a % $b) ? gcd($b, $a % $b) : $b;
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

function answerPrime(int $number): int 
{
    if (!function_exists("Brain\Games\Engine\isPrime")) {
        function isPrime(int $number): int
        {
            if ($number < 2) {
                return false;
            }
            for ($i = 2; $i < $number; $i++) {
                if ($number % $i == 0) {
                    return false;
                }
            }
            return true;
        }
    }

    if (call_user_func("Brain\Games\Engine\isPrime", $number)) {
        return "yes";
    } else {
        return "no";
    }
}
