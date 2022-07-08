<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::get('/', [TaskController::class, 'index'])->name('task.index');
Route::get('/create', [TaskController::class, 'create'])->name('task.create');
Route::post('/store', [TaskController::class, 'store'])->name('task.store');
Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('task.edit');
Route::put('/update/{id}', [TaskController::class, 'update'])->name('task.update');
Route::delete('/destroy/{id}', [TaskController::class, 'destroy'])->name('task.destroy');