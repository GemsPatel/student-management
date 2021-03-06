<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [StudentController::class, 'index'] )->name('students.index');
Route::get('students', [StudentController::class, 'index'] )->name('students.index');
Route::get('subjects', [SubjectController::class, 'index'] )->name('subjects.index');

Route::resource('students', StudentController::class);
Route::resource('subjects', SubjectController::class);