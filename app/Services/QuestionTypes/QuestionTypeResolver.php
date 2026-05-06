<?php

namespace App\Services\QuestionTypes;

class QuestionTypeResolver
{
    public static function resolve(string $type): QuestionTypeInterface
    {
        return match ($type) {
            'binary' => new BinaryQuestion(),
            'single_choice' => new SingleChoiceQuestion(),
            'multiple_choice' => new MultipleChoiceQuestion(),
            'text' => new TextQuestion(),
            'number' => new NumberQuestion(),
            default => throw new \Exception("Invalid question type"),
        };
    }
}