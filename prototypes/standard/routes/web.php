<?php

use App\Http\Controllers\BriefController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TacheController;
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
    return view('welcome');
});

Route::resource('/brief', BriefController::class);
Route::resource('/brief/tache', TacheController::class)->except('tache.create');

Route::get('/brief/{token}/tache',[TacheController::class, 'create'])->name('tache.create');

Route::resource('/student', StudentController::class);

Route::get('/assignement', [BriefController::class, 'assigner'])->name('assign');