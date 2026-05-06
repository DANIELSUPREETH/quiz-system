<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Attempt;
use App\Models\Answer;
use App\Services\QuestionTypes\QuestionTypeResolver;

class QuizController extends Controller
{
    public function submit(Request $request, $quizId)
    {
        $quiz = Quiz::with('questions.options')->findOrFail($quizId);

        // 1. Create Attempt
        $attempt = Attempt::create([
            'quiz_id' => $quiz->id,
            'score' => 0
        ]);

        $totalScore = 0;

        // 2. Loop through questions
        foreach ($quiz->questions as $question) {

            $userAnswer = $request->input("answers.{$question->id}");

            // Store Answer
            Answer::create([
                'attempt_id' => $attempt->id,
                'question_id' => $question->id,
                'answer' => is_array($userAnswer) ? json_encode($userAnswer) : $userAnswer
            ]);

            // 3. Evaluate
            $handler = QuestionTypeResolver::resolve($question->question_type);

            $score = $handler->evaluate(
                $question,
                is_array($userAnswer) ? $userAnswer : $userAnswer
            );

            $totalScore += $score;
        }

        // 4. Update total score
        $attempt->update([
            'score' => $totalScore
        ]);

        // 5. Return result
        return response()->json([
            'message' => 'Quiz submitted successfully',
            'score' => $totalScore
        ]);
    }
}