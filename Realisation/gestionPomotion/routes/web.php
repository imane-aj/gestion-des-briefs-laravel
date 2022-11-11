<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\BriefController;
use App\Http\Controllers\AssignController;
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
Route::get("searchBrief", [SearchController::class, 'searchBrief']);

Route::controller(StudentController::class)
    ->prefix('/student')
    ->as('student.')->group(function(){
    Route::get('/create/{token}','create')->name('create');
    Route::post('/create/{token}','store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/edit/{id}', 'update')->name('update');
    Route::delete('/delete/{id}', 'destroy')->name('destroy');
});

Route::resource('/brief', BriefController::class);
Route::resource('/brief/task', TaskController::class)->except('task.create');

Route::get('/brief/{token}/task',[TaskController::class, 'create'])->name('task.create');

Route::resource('/assignement', AssignController::class);

Route::get('/assignement', [AssignController::class, 'addAll'])->name('assignAll');
