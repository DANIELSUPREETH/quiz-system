<?php

namespace App\Services\QuestionTypes;

use App\Models\Question;

class NumberQuestion implements QuestionTypeInterface
{
    public function evaluate(Question $question, $userAnswer): int
    {
        // Convert both to integers for safe comparison
        $userAnswer = (int) $userAnswer;
        $correctNumber = (int) $question->correct_number;

        return $userAnswer === $correctNumber
            ? $question->marks
            : 0;
    }
}