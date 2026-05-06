<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option;

class QuizSeeder extends Seeder
{
    public function run(): void
    {
        $quiz = Quiz::create([
            'title' => 'Ultimate Programming Quiz',
            'description' => 'Test your programming knowledge with 10 questions'
        ]);

        // Q1 - Binary
        $q1 = Question::create([
            'quiz_id' => $quiz->id,
            'question_text' => 'Is Laravel a PHP framework?',
            'question_type' => 'binary',
            'marks' => 1
        ]);
        Option::create(['question_id' => $q1->id, 'option_text' => 'Yes', 'is_correct' => true]);
        Option::create(['question_id' => $q1->id, 'option_text' => 'No', 'is_correct' => false]);

        // Q2 - Single Choice
        $q2 = Question::create([
            'quiz_id' => $quiz->id,
            'question_text' => 'Which language runs in browser?',
            'question_type' => 'single_choice',
            'marks' => 1
        ]);
        Option::create(['question_id' => $q2->id, 'option_text' => 'Python', 'is_correct' => false]);
        Option::create(['question_id' => $q2->id, 'option_text' => 'JavaScript', 'is_correct' => true]);
        Option::create(['question_id' => $q2->id, 'option_text' => 'C++', 'is_correct' => false]);

        // Q3 - Multiple Choice
        $q3 = Question::create([
            'quiz_id' => $quiz->id,
            'question_text' => 'Select programming languages',
            'question_type' => 'multiple_choice',
            'marks' => 2
        ]);
        Option::create(['question_id' => $q3->id, 'option_text' => 'Python', 'is_correct' => true]);
        Option::create(['question_id' => $q3->id, 'option_text' => 'HTML', 'is_correct' => false]);
        Option::create(['question_id' => $q3->id, 'option_text' => 'Java', 'is_correct' => true]);

        // Q4 - Text
        Question::create([
            'quiz_id' => $quiz->id,
            'question_text' => 'Which framework are you using now?',
            'question_type' => 'text',
            'correct_text' => 'laravel',
            'marks' => 1
        ]);

        // Q5 - Number
        Question::create([
            'quiz_id' => $quiz->id,
            'question_text' => 'What is 6 * 7?',
            'question_type' => 'number',
            'correct_number' => 42,
            'marks' => 1
        ]);

        // Q6
        Question::create([
            'quiz_id' => $quiz->id,
            'question_text' => 'What is 10 + 5?',
            'question_type' => 'number',
            'correct_number' => 15,
            'marks' => 1
        ]);

        // Q7
        $q7 = Question::create([
            'quiz_id' => $quiz->id,
            'question_text' => 'Which is backend language?',
            'question_type' => 'single_choice',
            'marks' => 1
        ]);
        Option::create(['question_id' => $q7->id, 'option_text' => 'HTML', 'is_correct' => false]);
        Option::create(['question_id' => $q7->id, 'option_text' => 'PHP', 'is_correct' => true]);
        Option::create(['question_id' => $q7->id, 'option_text' => 'CSS', 'is_correct' => false]);

        // Q8
        $q8 = Question::create([
            'quiz_id' => $quiz->id,
            'question_text' => 'Is CSS a programming language?',
            'question_type' => 'binary',
            'marks' => 1
        ]);
        Option::create(['question_id' => $q8->id, 'option_text' => 'Yes', 'is_correct' => false]);
        Option::create(['question_id' => $q8->id, 'option_text' => 'No', 'is_correct' => true]);

        // Q9
        Question::create([
            'quiz_id' => $quiz->id,
            'question_text' => 'Type "AI" in capital letters',
            'question_type' => 'text',
            'correct_text' => 'ai',
            'marks' => 1
        ]);

        // Q10
        $q10 = Question::create([
            'quiz_id' => $quiz->id,
            'question_text' => 'Select frontend technologies',
            'question_type' => 'multiple_choice',
            'marks' => 2
        ]);
        Option::create(['question_id' => $q10->id, 'option_text' => 'React', 'is_correct' => true]);
        Option::create(['question_id' => $q10->id, 'option_text' => 'Node.js', 'is_correct' => false]);
        Option::create(['question_id' => $q10->id, 'option_text' => 'Vue', 'is_correct' => true]);
    }
}