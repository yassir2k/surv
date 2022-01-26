<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/questions', [ApiController::class, 'GetQuestions']);
Route::get('/total-today', [ApiController::class, 'GetTotalToday']);
Route::get('/total-accredited-today', [ApiController::class, 'GetTotalAcceditedToday']);
Route::get('/total-public-today', [ApiController::class, 'GetTotalPublicToday']);
Route::get('/total', [ApiController::class, 'GetTotal']);
Route::get('/total-accredited', [ApiController::class, 'GetTotalAccedited']);
Route::get('/total-public', [ApiController::class, 'GetTotalPublic']);
Route::get('/absolute', [ApiController::class, 'GetAbsolute']);
Route::get('/today', [ApiController::class, 'GetToday']);
Route::post('/dated-feedback-total', [ApiController::class, 'GetDatedFeedbackTotal']);
 
Route::post('/login', [ApiController::class, 'Login']);
Route::post('/savefeedback',[ApiController::class, 'SaveFeedback']);
