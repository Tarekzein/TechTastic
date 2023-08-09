<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[\App\Http\Controllers\MainPagesController::class,"home"])->name("home");

Route::group(["prefix"=>'blog'],function (){

    Route::get('/',[\App\Http\Controllers\MainPagesController::class,"blog"])->name("blog");
    Route::get('/{slug}',[\App\Http\Controllers\MainPagesController::class,"singlePost"])->name("blog.post");

});

Route::group(["prefix"=>'portfolio'],function (){

    Route::get('/',[\App\Http\Controllers\MainPagesController::class,"portfolio"])->name("portfolio");

});




