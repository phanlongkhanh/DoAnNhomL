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
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\ListProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryPostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PayController;





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
//Show Screen TranSport Update
Route::get('update-transport', [TranSportController::class, 'ShowUpdateTranSport']);
//Show Screen Supplier Index
Route::get('index-suppliers', [SupplierController::class, 'ShowIndexSuppliers']);
//Show Screen Supplier Create
Route::get('create-suppliers', [SupplierController::class, 'ShowCreateSuppliers']);
//Show Screen Supplier Update
Route::get('update-suppliers', [SupplierController::class, 'ShowUpdateSuppliers']);
//Show ProductDetails
Route::get('details-product', [UserController::class, 'ShowProductDetails']);
//Show User Category
Route::get('category-user-product', [UserController::class, 'ShowUserCategory']);
//Show User Cart
Route::get('cart-user-product', [UserController::class, 'ShowUserCart']);
//Show Product HomePage
Route::get('products-homepage', [UserController::class, 'ShowProductToHomepage']);
//Show Favorite index
Route::get('favorite-index', [FavoriteController::class, 'ShowIndexFavorite']);
//Show index Post Admin
Route::get('index-post', [PostController::class, 'ShowIndexPost']);
//Show Create Post Admin
Route::get('create-post', [PostController::class, 'ShowCreatePost']);
//Show Screen Category Post
Route::get('index-post_category', [CategoryPostController::class, 'ShowIndexCategoryPost']);
//Show Screen Index Pay
Route::get('pay-index', [PayController::class, 'ShowPayIndex']);
//Show Screen View Pay
Route::get('pay-view', [PayController::class, 'ViewPay']);



// Tính năng

//Login
Route::POST('login/loginrun', [LoginRegisterController::class, 'LoginPage']);
//Register
Route::POST('register/registerrun', [LoginRegisterController::class, 'RegisterPage']);
//LogOut
Route::GET('logout', [LoginRegisterController::class, 'LogOutUser']);
//ForgotPass
Route::POST('forgot_password', [ForgotPassController::class, 'sendResetLinkEmail'])->name('getpass');
//Reset PassWord
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
//Update PassWord
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


//

Route::get('category-products/search-selective', [SearchController::class, 'SearchSelective'])->name('category-products.search-selective');
//Search - CategorySearch
Route::get('category-products/search', [SearchController::class, 'search'])->name('category-products.search');
//Add ProductType
Route::POST('add-product-type', [ProductTypeController::class, 'AddProductType']);
//active loại sản phẩm
Route::get('product-type/active/{id}', [ProductTypeController::class, 'ActiveProductType'])->name('active-product-type');
//active orders
Route::get('orders/active/{id}', [OdersController::class, 'ActiveOrders'])->name('active-orders');
//Edit ProductType
Route::get('edit-producttype/{id}', [ProductTypeController::class, 'EditProductType']);
//Remove ProductType
Route::delete('product-type-remove/{id}', [ProductTypeController::class, 'RemoveProductType'])->name('remove-product-type');
//Update ProductType
Route::put('product-type-update/{id}', [ProductTypeController::class, 'UpdateProductType'])->name('product-type-update');
//Add TranSport
Route::POST('add-tranport', [TranSportController::class, 'AddProductType']);
//Edit TranSport
Route::get('edit-transports/{id}', [TranSportController::class, 'EditTranSport']);
//Update TranSprot
Route::put('transport-update/{id}', [TranSportController::class, 'UpdateTranSport'])->name('transport-update');
//Remove TranSport
Route::delete('transport-remove/{id}', [TranSportController::class, 'RemoveTranSport'])->name('transport-remove');
//Active TranSport
Route::get('transport/active/{id}', [TranSportController::class, 'ActiveTranSport'])->name('transport-active');
//Add Suppliers
Route::POST('add-suppliers', [SupplierController::class, 'AddSuppliers']);
//Edit Suppliers
Route::get('edit-suppliers/{id}', [SupplierController::class, 'ShowEditSuppliers']);
//Update Suppliers
Route::put('suppliers-update/{id}', [SupplierController::class, 'UpdateSuppliers'])->name('suppliers-update');
//Remove Suppliers
Route::delete('suppliers-remove/{id}', [SupplierController::class, 'RemoveSuppliers'])->name('suppliers-remove');
//Details Product
Route::get('details-product/{id}', [ProductDetailController::class, 'ShowProductDetails']);
//Add To Cart
Route::post('add-to-cart', [CartController::class, 'AddToCart'])->name('add.to.cart');
//Delete Cart
Route::delete('carts-remove/{id}', [CartController::class, 'RemoveFromCart'])->name('carts-remove');
//Add Favorite
Route::post('favorite-add', [FavoriteController::class, 'AddToFavorite']);
//Delete Favorite
Route::delete('favorite-delete/{id}', [FavoriteController::class, 'DeleteFavorite']);
//Edit Pay
Route::get('pay-edit/{id}', [PayController::class, 'EditPay']);
//Add Pay
Route::post('create-pay', [PayController::class, 'AddPay']);
//Update Status pays
Route::get('pays/{id}/update-status/{status}', [OdersController::class, 'updateStatus'])->name('pays.updateStatus');
