<?php

namespace App\Services\QuestionTypes;

use App\Models\Question;

class SingleChoiceQuestion implements QuestionTypeInterface
{
    public function evaluate(Question $question, $userAnswer): int
    {
        $correctOption = $question->options()
            ->where('is_correct', true)
            ->first();

        if (!$correctOption) {
            return 0;
        }

        // FIX: Compare as string
        return (string)$correctOption->id === (string)$userAnswer
            ? $question->marks
            : 0;
    }
}