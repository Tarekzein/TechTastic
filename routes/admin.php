<?php

use Illuminate\Support\Facades\Route;

Route::group(["prefix"=>"dashboard","middleware"=>[
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    "role:super-admin"
]],function (){

    Route::get('/', [\App\Http\Controllers\Admin\DashboardPagesController::class,"dashboard"])->name('dashboard');

    Route::group(["prefix"=>"posts"],function (){
        Route::get("/",[\App\Http\Controllers\Admin\DashboardPagesController::class,"posts"])->name("posts.show");
        Route::get('/create', [\App\Http\Controllers\Admin\Post\CreateController::class,"index"])->name('posts.create');
    });

    Route::group(["prefix"=>"projects"],function (){
//        Route::get('/create', [\App\Http\Controllers\Admin\Post\CreateController::class,"index"])
//            ->name('post.create');
    });

});


