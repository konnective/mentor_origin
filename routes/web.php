<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;

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

//routes of the_mentor2
Route::get('/', [ProjectController::class, 'index']);
Route::get('/project/add', [ProjectController::class, 'add'])->name('project.add');
Route::get('/project/edit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
Route::post('/project/store', [ProjectController::class, 'store'])->name('project.store');
Route::post('/project/update', [ProjectController::class, 'update'])->name('project.update');
Route::get('/create', [ProductController::class, 'create']);

Route::get('/payment', [ProductController::class, 'payment']);

Route::post('/save_payment', [ProductController::class, 'save_payment']);

// Route::post('/tasks', [ProductController::class, 'makeTask']);

Route::post('/login', [UserController::class, 'login']);


Route::get('goes', [ProductController::class, 'goes'])->name('goes');
Route::get('/tasks/{id}', [ProductController::class, 'task_list']);
Route::get('/task/add', [ProductController::class, 'create']);
Route::post('/task/store', [ProductController::class, 'store']);
Route::post('/tasks/update/{id}', [ProductController::class, 'update']);





//for projects
Route::get('/project/add', [ProductController::class, 'create_project']);
Route::post('/project/store_project', [ProductController::class, 'store_project']);
//for daily cycles
Route::get('/daily_cycles', [ProductController::class, 'daily_cycles']);
