<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth\login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/capture', [App\Http\Controllers\CaptureController::class, 'insert'])->name('capture');
Route::post('/report', [App\Http\Controllers\ReportController::class, 'fetch'])->middleware('authenticated');
//Route::post('capture','CaptureController@insert');
/*Route::post('/capture', function () {
    return view('home');
})->name('capture');*/
