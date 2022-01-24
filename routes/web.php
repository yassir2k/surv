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

Route::get('/', function () {
    return view('survey');
});

Route::get('/admin', function () {
    return view('admin/login');
});

Route::get('/admin/dashboard', function () {
    return view('admin/dashboard');
});

Route::get('/admin/total-today', function () {
    return view('admin/total-today');
});

Route::get('/admin/absolute-total', function () {
    return view('admin/absolute-total');
});

Route::get('/admin/chart', function () {
    return view('admin/chart');
});

Route::get('/admin/load-feedback/{id}', [FeedbackController::class, 'LoadFeedback']);

Route::post('/submit-feedback', [FeedbackController::class, 'SaveFeedback']);
