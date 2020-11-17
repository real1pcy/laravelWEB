<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\VacancyController;

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

Route::get('/resume', [ResumeController::class, 'index'] );
Route::get('/resume/create', [ResumeController::class, 'create'] );
Route::post('/resume', [ResumeController::class, 'store'] );
Route::get('/resume/{id}', [ResumeController::class, 'show'] );
Route::post('/resume/update', [ResumeController::class, 'update'] );
Route::delete('/resume/{id}', [ResumeController::class, 'destroy'] );

Route::get('/vacancy', [VacancyController::class, 'index'] );
Route::get('/vacancy/create', [VacancyController::class, 'create'] );
Route::post('/vacancy', [VacancyController::class, 'store'] );
Route::get('/vacancy/{id}', [VacancyController::class, 'show'] );
Route::delete('/vacancy/{id}', [VacancyController::class, 'destroy'] );
Route::post('/vacancy/update', [VacancyController::class, 'update'] );

Route::get('/', function () {
    return view('home_without_reg');
});






