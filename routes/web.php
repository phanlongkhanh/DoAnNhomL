<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminCategoryProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;

//Show Home Page User
Route::get('homepage',[UserController::class,'ShowHomePage']);

// Show Login User
Route::get('login',[UserController::class,'ShowUserLogin']);

// Show Register User
Route::get('register',[UserController::class,'ShowUserRegister']);

//Show Screen Admin
Route::get('admin-controller',[AdminController::class,'ShowDashBoardAdmin']);

// Category Screen Index Category
Route::get('category',[AdminCategoryProductController::class,'showCategory'])->name('indexcategory');

// Show Screen Create-category
Route::get('add-category',[AdminCategoryProductController::class,'showAddCategory']);

// Show Screen Edit-category
Route::get('edit-category',[AdminCategoryProductController::class,'showEditCategory']);

// Show Screen Index Product
Route::get('product',[AdminProductController::class,'ShowIndexProduct']);

// Show Screen Create-Product
Route::get('create-product',[AdminProductController::class,'ShowCreateProduct']);

// Show Screen Update-Product
Route::get('update-product',[AdminProductController::class,'ShowUpdateProduct']);