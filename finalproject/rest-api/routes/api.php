<?php

use App\Http\Controllers\NewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Method GET
Route::get('/news', [NewController::class, 'index']);

// Method POST
Route::post('/news', [NewController::class, 'store']);

// Method PUT
Route::put('/news/{id}', [NewController::class, 'update']);

// Method DELETE
Route::delete('/news/{id}', [NewController::class, 'destroy']);

Route::get('/news/{id}', [NewController::class, 'show']);

# panggil controller
use App\Http\Controllers\AuthController;

# untuk register dan login pake auth
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

#bungkus route dengan middleware sanctum
Route::middleware('auth:sanctum')->group(function () {
    # Method GET, route /students
    Route::get('/students', [StudentController::class, 'index']);
    # Create student
    Route::post('/students', [StudentController::class, 'store']);
    # Update student
    Route::put('/students/{id}', [StudentController::class, 'update']);
    # Delete student
    Route::delete('/students/{id}', [StudentController::class, 'destroy']);
});

# untuk register dan login pake auth
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);