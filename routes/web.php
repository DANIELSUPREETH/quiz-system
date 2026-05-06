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
    return redirect('/quiz/1');
});


// Show quiz page
Route::get('/quiz/{id}', function ($id) {
    $quiz = Quiz::with('questions.options')->findOrFail($id);
    return view('quiz', compact('quiz'));
});