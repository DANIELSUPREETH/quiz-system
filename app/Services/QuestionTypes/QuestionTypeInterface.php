<?php

namespace App\Services\QuestionTypes;

use App\Models\Question;

interface QuestionTypeInterface
{
    public function evaluate(Question $question, $userAnswer): int;
}