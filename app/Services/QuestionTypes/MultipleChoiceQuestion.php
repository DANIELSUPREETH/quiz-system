<?php

namespace App\Services\QuestionTypes;

use App\Models\Question;

class MultipleChoiceQuestion implements QuestionTypeInterface
{
    public function evaluate(Question $question, $userAnswer): int
    {
        // Ensure array
        if (!is_array($userAnswer)) {
            $userAnswer = [$userAnswer];
        }

        $correctOptions = $question->options()
            ->where('is_correct', true)
            ->pluck('id')
            ->map(fn($id) => (string)$id)
            ->toArray();

        $userAnswer = array_map('strval', $userAnswer);

        sort($correctOptions);
        sort($userAnswer);

        return $correctOptions === $userAnswer ? $question->marks : 0;
    }
}