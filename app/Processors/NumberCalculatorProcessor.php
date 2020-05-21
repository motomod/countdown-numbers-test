<?php


namespace App\Processors;

use App\Model\Equation\Operation;

class NumberCalculatorProcessor
{
    protected array $operators = ['+', '-', '/', '*'];
    protected int $attemptCounter = 0;

    public function findEquations(int $target, array $numbers): array
    {
        if (in_array($target, $numbers)) {
            return [$target];
        }

        $attempts = array_map(function ($number) {
            return [$number];
        }, $numbers);

        $correctEquations = [];

        for ($x = 0; $x <= count($numbers) - 2; $x++) {
            foreach ($attempts as $index => $attempt) {
                unset($attempts[$index]);

                foreach ($numbers as $number) {
                    if (in_array($number, $attempt)) {
                        continue;
                    }

                    foreach ($this->operators as $operator) {
                        $newAttempt = $attempt;
                        $newAttempt[] = $operator;
                        $newAttempt[] = $number;

                        $result = $this->calculateAttempt($target, $newAttempt);

                        if (false !== $result) {
                            $correctEquations[] = $result;
                        }

                        $attempts[] = $newAttempt;
                    }
                }
            }
        }

        return $correctEquations;
    }

    protected function calculateAttempt(int $target, array $attempt)
    {
        $this->attemptCounter++;

        $startingBrackets = floor((count($attempt) / 2));
        $equation = str_repeat('(', $startingBrackets);

        $bracketNext = false;

        foreach ($attempt as $index => $value) {
            $equation .= $value;

            if (true === $bracketNext) {
                $equation .= ")";
                $bracketNext = false;
            }

            if (is_string($value)) {
                $bracketNext = true;
            }
        }

        $result = false;

        eval("\$result = ".$equation.";");

        if ($target === $result) {
            return $equation;
        }

        return false;
    }
}
