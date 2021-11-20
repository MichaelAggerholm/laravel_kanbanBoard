<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Models\Task;

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

Route::resource('tasks', TaskController::class);

Route::get('/moveToBacklog/{task}', [TaskController::class, 'moveToBacklog'])->name('moveToBacklog');
Route::get('/moveToInProgress/{task}', [TaskController::class, 'moveToInProgress'])->name('moveToInProgress');
Route::get('/moveToTesting/{task}', [TaskController::class, 'moveToTesting'])->name('moveToTesting');
Route::get('/moveToDone/{task}', [TaskController::class, 'moveToDone'])->name('moveToDone');
