<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\GoalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|

*/

//dashboard apis
//remember in order to post to work you have disabled 
// \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class, in kernel.php
Route::get('tasks', [ProductController::class, 'tasks']);
Route::post('remove_task', [ProductController::class, 'remove_task']);
Route::post('add_task', [ProductController::class, 'add_task']);
Route::get('daily_task', [ProductController::class, 'daily_task']);


Route::get('goals', [GoalController::class, 'index']);
Route::post('goal_next', [GoalController::class, 'goal_next']);
Route::post('add_goal', [GoalController::class, 'add_goal']);
Route::get('graph_data', [GoalController::class, 'graph_data']);
Route::get('projects', [GoalController::class, 'projects']);
//for blogs module
Route::get('blogs', [BlogController::class, 'blogs']);
Route::post('one_blog', [BlogController::class, 'one_blog']);
Route::post('add_blog', [BlogController::class, 'add_blog']);
Route::get('topics', [BlogController::class, 'topics']);

Route::post('user_data', [UserController::class, 'user_data']);
Route::post('login', [UserController::class, 'login']);

Route::post('creds', [AuthController::class, 'pass']);
Route::post('add_cred', [AuthController::class, 'add_pass']);
//for finances
Route::post('finances', [FinanceController::class, 'finances']);
Route::post('add_payment', [FinanceController::class, 'add_payment']);
Route::post('dispatch', [FinanceController::class, 'test']);


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });