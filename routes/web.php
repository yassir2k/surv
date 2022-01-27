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

Route::get('/admin/total-records-with-date', function () {
    return view('admin/total-records-with-date');
});

Route::get('/admin/accredited-users-records-with-date', function () {
    return view('admin/accredited-users-records-with-date');
});

Route::get('/admin/public-users-records-with-date', function () {
    return view('admin/public-users-records-with-date');
});

Route::get('/admin/total-records-with-date-range', function () {
    return view('admin/total-records-with-date-range');
});

Route::get('/admin/absolute-records', function () {
    return view('admin/absolute-records');
});

Route::get('/admin/absolute-records-accredited-users', function () {
    return view('admin/absolute-records-accredited-users');
});

Route::get('/admin/absolute-records-public-users', function () {
    return view('admin/absolute-records-public-users');
});

Route::get('/admin/accredited-users-records-with-date-range', function () {
    return view('admin/accredited-users-records-with-date-range');
});

Route::get('/admin/public-users-records-with-date-range', function () {
    return view('admin/public-users-records-with-date-range');
});

Route::get('/admin/todays-records', function () {
    return view('admin/todays-records');
});

Route::get('/admin/todays-records-accredited-users', function () {
    return view('/admin/todays-records-accredited-users');
});

Route::get('/admin/todays-records-public-users', function () {
    return view('/admin/todays-records-public-users');
});

Route::get('/admin/chart', function () { 
    return view('admin/chart');
});

Route::get('/admin/load-feedback/{id}', [FeedbackController::class, 'LoadFeedback']);

Route::post('/submit-feedback', [FeedbackController::class, 'SaveFeedback']);
