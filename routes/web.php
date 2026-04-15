<?php

use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

Route::get('/', [QuizController::class, 'index']);
Route::get('/quiz', [QuizController::class, 'quiz']);
Route::get('/result-page', [QuizController::class, 'showResult']);
Route::get('/result', [QuizController::class, 'result']); 


Route::post('/start', [QuizController::class, 'start']);
Route::get('/question/{index}', [QuizController::class, 'getQuestion']);
Route::post('/answer', [QuizController::class, 'submitAnswer']);
Route::get('/result', [QuizController::class, 'result']);
