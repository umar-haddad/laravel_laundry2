<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// (/)
Route::get('/', function () {
    $response = ['message' => 'Welcome to the API'];
    return response()->json($response, 200);
});

Route::get('user', [ApiController::class, 'getUsers']);
Route::get('user/{id}', [ApiController::class, 'editUser']);
Route::post('user', [ApiController::class, 'storeUser']);
Route::put('user/{id}', [ApiController::class, 'updateUser']);
Route::delete('user/{id}', [ApiController::class, 'deleteUser']);
