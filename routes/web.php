<?php

use App\Http\Controllers\productController;
use App\Http\Controllers\sinhVienController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo 'Trang chủ';
});
Route::get('/test', function () {
    echo '123';
});

Route::get('/list-user/{id}/{name?}', [UserController::class, 'getUser']);


//Params
//http://127.0.0.1:8000/update-user?id=1&name=chien
Route::get('/update-user', [UserController::class, 'updateUser']);

Route::get('/list-user', [UserController::class, 'showUser']);


// Route::get('list-product', [productController::class, 'listProduct']);

Route::get('/thongtinsv', [sinhVienController::class, 'showSinhVien']);

Route::group(['prefix'=>'users','as'=>'users.'],function(){
    Route::get('list-users',[UserController::class,'listUsers'])->name('listUsers');

    Route::get('add-users',[UserController::class,'addUsers'])->name('addUsers');
    Route::post('add-users',[UserController::class,'addPostUsers'])->name('addPostUsers');
    
    Route::get('delete-users/{userId}',[UserController::class,'deleteUsers'])->name('deleteUsers');

    Route::get('update-users/{userId}',[UserController::class,'updateUsers'])->name('updateUsers');
    Route::post('update-users',[UserController::class,'updatePostUsers'])->name('updatePostUsers');
});

Route::group(['prefix'=>'products','as'=>'products.'],function(){
    Route::get('list-products',[productController::class,'listProducts'])->name('listProducts');

    Route::get('search-products',[productController::class,'searchProducts'])->name('searchProducts');

    Route::get('add-products',[productController::class,'addProducts'])->name('addProducts');
    Route::post('add-products',[productController::class,'addPostProducts'])->name('addPostProducts');
    
    Route::get('delete-products/{userId}',[productController::class,'deleteProducts'])->name('deleteProducts');

    Route::get('update-products/{userId}',[productController::class,'updateProducts'])->name('updateProducts');
    Route::post('update-products',[productController::class,'updatePostProducts'])->name('updatePostProducts');
});
