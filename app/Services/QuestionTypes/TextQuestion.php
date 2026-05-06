<?php

namespace App\Services\QuestionTypes;

use App\Models\Question;

class TextQuestion implements QuestionTypeInterface
{
    public function evaluate(Question $question, $userAnswer): int
    {
        // Normalize both values (remove spaces + lowercase)
        $userAnswer = strtolower(trim($userAnswer ?? ''));
        $correctAnswer = strtolower(trim($question->correct_text ?? ''));

        return $userAnswer === $correctAnswer
            ? $question->marks
            : 0;
    }
}