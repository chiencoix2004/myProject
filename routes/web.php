<?php

use App\Http\Controllers\sinhVienController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    echo 'Trang chủ';
});
Route::get('/test', function(){
    echo '123';
});

Route::get('/list-user/{id}/{name?}', [UserController::class, 'getUser']);


//Params
//http://127.0.0.1:8000/update-user?id=1&name=chien
Route::get('/update-user', [UserController::class, 'updateUser']);

Route::get('/list-user', [UserController::class, 'showUser']);

Route::get('/thongtinsv', [sinhVienController::class, 'showSinhVien']);
