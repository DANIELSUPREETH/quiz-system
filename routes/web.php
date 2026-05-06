<?php

use Illuminate\Support\Facades\Route;
use App\Models\Quiz;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| These routes handle browser-based pages (UI).
|
*/

// Home route (optional)
Route::get('/', function () {
    return "Quiz System Running";
});

// Show quiz page
Route::get('/quiz/{id}', function ($id) {
    $quiz = Quiz::with('questions.options')->findOrFail($id);
    return view('quiz', compact('quiz'));
});