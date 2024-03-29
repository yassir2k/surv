<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\BiReportController;
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
//----------------------------------------------------//
Route::get('/total-accredited-today', [ApiController::class, 'GetTotalAccreditedToday']);
Route::get('/total-public-today', [ApiController::class, 'GetTotalPublicToday']);
Route::get('/total', [ApiController::class, 'GetTotal']);
//----------------------------------------------------//
Route::get('/total-accredited', [ApiController::class, 'GetTotalAccredited']);
Route::get('/total-public', [ApiController::class, 'GetTotalPublic']);
Route::get('/absolute', [ApiController::class, 'GetAbsolute']);
//----------------------------------------------------//
Route::get('/today', [ApiController::class, 'GetToday']);
Route::get('/today-accredited', [ApiController::class, 'GetTodayAccredited']);
Route::get('/today-public', [ApiController::class, 'GetTodayPublic']);
//----------------------------------------------------//
Route::post('/dated-feedback-total', [ApiController::class, 'GetDatedFeedbackTotal']);
Route::post('/dated-feedback-accredited-users', [ApiController::class, 'GetDatedFeedbackAccredited']);
Route::post('/dated-feedback-public-users', [ApiController::class, 'GetDatedFeedbackPublic']);
//----------------------------------------------------//
Route::post('/feedback-total-a-date', [ApiController::class, 'GetFeedbackTotalForADate']);
Route::post('/feedback-accredited-users-a-date', [ApiController::class, 'GetFeedbackAccreditedForADate']);
Route::post('/feedback-public-users-a-date', [ApiController::class, 'GetFeedbackPublicForADate']);
//----------------------------------------------------//
Route::post('/dated-feedback-total', [ApiController::class, 'GetDatedFeedbackTotal']);
Route::post('/dated-feedback-accredited-users', [ApiController::class, 'GetDatedFeedbackAccredited']);
Route::post('/dated-feedback-public-users', [ApiController::class, 'GetDatedFeedbackPublic']);
//----------------------------------------------------//
Route::get('/absolute-accredited', [ApiController::class, 'GetAbsoluteAccredited']);
Route::get('/absolute-public', [ApiController::class, 'GetAbsolutePublic']);
 
Route::post('/login', [ApiController::class, 'Login']);
Route::post('/savefeedback',[ApiController::class, 'SaveFeedback']);
Route::post('/change_user_password', [ApiController::class, 'ChangeUserPassword']);

/*
|--------------------------------------------------------------------------
| API Routes FOr Business Intelligence Reports online_environment_Q1 
|--------------------------------------------------------------------------
|
*/

Route::post('/service_delivery_Q1', [BiReportController::class, 'ServiceDeliveryQ1']);
Route::post('/service_delivery_Q2', [BiReportController::class, 'ServiceDeliveryQ2']);
Route::post('/qualityQ1', [BiReportController::class, 'QualityQ1']);
Route::post('/timeliness_Q1', [BiReportController::class, 'TimelinessQ1']);
Route::post('/timeliness_Q2', [BiReportController::class, 'TimelinessQ2']);
Route::post('/timeliness_Q3', [BiReportController::class, 'TimelinessQ3']);
Route::post('/timeliness_Q4', [BiReportController::class, 'TimelinessQ4']);
Route::post('/online_environment_Q1', [BiReportController::class, 'OnlineEnvironmentQ1']);
Route::post('/online_environment_Q2', [BiReportController::class, 'OnlineEnvironmentQ2']);
Route::post('/online_environment_Q3', [BiReportController::class, 'OnlineEnvironmentQ3']);
Route::post('/challenges_Q1', [BiReportController::class, 'ChallengesQ1']);