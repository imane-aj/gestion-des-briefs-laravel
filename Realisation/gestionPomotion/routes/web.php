<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PromotionController;

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
    return view('welcome');
});

Route::resource("/promotion", PromotionController::class);
Route::get("searchPromo", [SearchController::class, 'searchPromo']);
Route::get("/student/searchStudent", [SearchController::class, 'searchStudent']);

Route::controller(StudentController::class)
    ->prefix('/student')
    ->as('student.')->group(function(){
    Route::get('/create/{token}','create')->name('create');
    Route::post('/create/{token}','store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/edit/{id}', 'update')->name('update');
    Route::delete('/delete/{id}', 'destroy')->name('destroy');
});
