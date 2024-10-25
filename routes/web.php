<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminCategoryProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ForgotPassController;
use App\Http\Controllers\ResetPassWordController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\OdersController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\TranSportController;

//Giao Diện
Route::get('/', [UserController::class, 'ShowUserLogin']);
//Show Home Page User
Route::get('homepage', [UserController::class, 'ShowHomePage']);
// Show Login User
Route::get('login', [UserController::class, 'ShowUserLogin']);
// Show Register User
Route::get('register', [UserController::class, 'ShowUserRegister']);
//Show Screen Admin
Route::get('admin-controller', [AdminController::class, 'ShowDashBoardAdmin'])->middleware('admin');
// Category Screen Index Category
Route::get('category', [AdminCategoryProductController::class, 'showCategory'])->name('indexcategory');
// Show Screen Create-category
Route::get('add-category', [AdminCategoryProductController::class, 'showAddCategory']);
// Show Screen Edit-category
Route::get('edit-category', [AdminCategoryProductController::class, 'showEditCategory']);
// Show Screen Index Product
Route::get('product', [AdminProductController::class, 'ShowIndexProduct']);
// Show Screen Create-Product
Route::get('create-product', [AdminProductController::class, 'ShowCreateProduct']);
// Show Screen Update-Product
Route::get('update-product', [AdminProductController::class, 'ShowUpdateProduct']);
// Show Screen Account Index
Route::get('account-index', [AccountController::class, 'ShowAccount']);
// Show Screen Forgot
Route::get('forgot_password', [UserController::class, 'ShowForgotPassword']);
//Show Screen CheckMail
Route::get('checkmail', [ForgotPassController::class, 'showNotificationEmail'])->name('checkmail');
//Show Screen ProductType
Route::get('product-type-index', [ProductTypeController::class, 'ShowProductType']);
//Show Screen Product-Type Create
Route::get('product-type-create', [ProductTypeController::class, 'ShowCreateTypeProduct']);
//Show Screen Produdct-Type Update
Route::get('product-type-update', [ProductTypeController::class, 'ShowUpdateTypeProduct']);
//Show Screen Oders Index
Route::get('oders-index', [OdersController::class, 'ShowIndexOders']);
//Show Screen Views Index
Route::get('oders-views', [OdersController::class, 'ShowViewOders']);
//Show Screen Index DashBoard
Route::get('index-dashboard', [DashBoardController::class, 'ShowIndexDashBoard']);
//Show Screen Dashboard
Route::get('dashboard', [DashBoardController::class, 'ShowDashBoard']);
//Show Screen View Dashboard
Route::get('view-dashboard', [DashBoardController::class, 'ShowViewDashBoard']);
//Show Screen TranSport Index
Route::get('index-transport', [TranSportController::class, 'ShowIndexTranSport']);
//Show Screen TranSport Create
Route::get('create-transport', [TranSportController::class, 'ShowCreateTranSport']);







//Tính năng

//Login
Route::POST('login/loginrun', [LoginRegisterController::class, 'LoginPage']);
//Register
Route::POST('register/registerrun', [LoginRegisterController::class, 'RegisterPage']);
//ForgotPass
Route::POST('forgot_password', [ForgotPassController::class, 'sendResetLinkEmail'])->name('getpass');
//Reset PassWord
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'resetPassword'])->name('password.update');

// Van
// Hiển thị trang thêm tài khoản
Route::get('add-account', [AccountController::class, 'ShowAddAccount']);
Route::post('add-account', [AccountController::class, 'AddAccount']);
// Hiển thị trang chỉnh sửa tài khoản
Route::get('edit-account/{id}', [AccountController::class, 'ShowEditAccount']);
// Cập nhật tài khoản
Route::post('update-account/{id}', [AccountController::class, 'update']);
// Xóa tài khoản
Route::delete('delete-account/{id}', [AccountController::class, 'destroy']);


// Route hiển thị trang thêm danh mục
Route::get('/admin/categories/add', [AdminCategoryProductController::class, 'showAddCategory'])->name('add-category');
// Route lưu danh mục mới
Route::post('/admin/categories/store', [AdminCategoryProductController::class, 'storeCategory'])->name('store-category');
// Route thay đổi trạng thái active của danh mục
Route::get('/admin/categories/active/{id}', [AdminCategoryProductController::class, 'toggleActiveCategory'])->name('activecategory');
// Hiển thị form chỉnh sửa danh mục
Route::get('edit-category/{id}', [AdminCategoryProductController::class, 'showEditCategory'])->name('editcategory');
// // Lưu danh mục đã chỉnh sửa
Route::post('update-category/{id}', [AdminCategoryProductController::class, 'updateCategory'])->name('update-category');
// Route xóa danh mục
Route::delete('/admin/categories/delete/{id}', [AdminCategoryProductController::class, 'destroyCategory'])->name('deletecategory');


//Thêm loại Sản Phẩm
Route::POST('add-product-type', [ProductTypeController::class, 'AddProductType']);
//active loại sản phẩm
Route::get('active-product-type/{id}', [ProductTypeController::class, 'ActiveProductType']);

