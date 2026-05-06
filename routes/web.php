<?php

use Illuminate\Support\Facades\Route;
use App\Models\Quiz;

Route::get('/', function () {
    return redirect('/quiz/1');
});

Route::get('/quiz/{id}', function ($id) {
    $quiz = Quiz::with('questions.options')->findOrFail($id);
    return view('quiz', compact('quiz'));
});