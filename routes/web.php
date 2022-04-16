<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin/load-feedback/{id}', [FeedbackController::class, 'LoadFeedback']);
Route::get('/{any}', function () {
    return view('Survey');
})->where('any','^(?!v).*$');


Route::post('/submit-feedback', [FeedbackController::class, 'SaveFeedback']); 
