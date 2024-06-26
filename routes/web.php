<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    echo 'Trang chủ';
});
Route::get('/test', function(){
    echo '123';
});

Route::get('/list-user', [UserController::class, 'showUser']);
