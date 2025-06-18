<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MainController;
use App\Http\Controllers\Api\PostsController;
use App\Http\Controllers\Api\ProfileController;
use Illuminate\Support\Facades\Route;


Route::group(["middleware" => "lang", "prefix" => "v1"], function () {

    Route::post("/login", [AuthController::class, "login"]);
    Route::post("/register", [AuthController::class, "register"]);

    Route::group(["middleware" => "auth:api"], function () {

        Route::post("/logout", [AuthController::class, "logout"]);

        //profile & posts
        Route::get("/me", [ProfileController::class, "profile"]);
        Route::get("/me/posts",[ProfileController::class,"myPosts"]);

        //posts
        Route::apiResource("/posts", PostsController::class);

        //main-routes
        Route::get("/posts-all", [MainController::class, "allPosts"]);
        Route::get("/posts/{post}/comments", [MainController::class, "comments"]);
        Route::get("posts/{post}/comments/{comment}/replies", [MainController::class, "replies"]);

        //comment & Reply
        Route::post("/posts/{post}/comment",[MainController::class, "addComent"]);
        Route::post("/posts/{post}/comments/{comment}/reply", [MainController::class,"reply"]);

    });

});
