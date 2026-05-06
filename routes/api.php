<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| These routes are stateless and do not use CSRF protection.
| Perfect for Postman / API testing.
|
*/

// Test route (optional - to check API is working)
Route::get('/test', function () {
    return response()->json([
        'message' => 'API working'
    ]);
});

// Quiz submission route
Route::post('/quiz/{id}/submit', [QuizController::class, 'submit']);