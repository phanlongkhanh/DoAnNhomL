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
use App\Http\Controllers\StatisticalController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProFileController;



//Show Screen Admin
Route::get('admin-controller', [AdminController::class, 'ShowDashBoardAdmin'])->middleware('admin');
//Show Screen Login and Register
Route::get('/', [UserController::class, 'ShowUserLogin'])->name('login');
Route::get('/register', [UserController::class, 'ShowUserRegister'])->name('register');

//Trang Chủ Giao Diện Đăng Nhập
Route::prefix('homepage')->group(function () {
    Route::get('/', [UserController::class, 'ShowHomePage'])->name('index-homepage');
    Route::POST('login/loginrun', [LoginRegisterController::class, 'LoginPage'])->name('login-user');
    Route::POST('register/registerrun', [LoginRegisterController::class, 'RegisterPage'])->name('register-user');
    Route::GET('logout', [LoginRegisterController::class, 'LogOutUser'])->name('logout-user');
    Route::get('/details-product', [UserController::class, 'ShowProductDetails'])->name('details-product');
    Route::get('/category-product', [UserController::class, 'ShowUserCategory'])->name('category-product');
    Route::get('/products-homepage', [UserController::class, 'ShowProductToHomepage'])->name('product-homepage');
    Route::get('/details-product/{id}', [ProductDetailController::class, 'ShowProductDetails'])->name('details-products');
});

//Bảng Điều Khiển
Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashBoardController::class, 'ShowDashBoard'])->name('index-dashboard');
    Route::get('/view', [DashBoardController::class, 'ShowViewDashBoard'])->name('view-dashboard');
});

//Loại Sản Phẩm
Route::prefix('producttypes')->group(function () {
    Route::get('/', [ProductTypeController::class, 'ShowProductType'])->name('index-producttypes');
    Route::get('/create', [ProductTypeController::class, 'ShowCreateTypeProduct'])->name('create-producttypes');
    Route::get('/{id}', [ProductTypeController::class, 'EditProductType'])->name('edit-producttypes');
    Route::POST('/add', [ProductTypeController::class, 'AddProductType'])->name('add-producttypes');
    Route::put('/{id}', [ProductTypeController::class, 'UpdateProductType'])->name('update-producttypes');
    Route::delete('/{id}', [ProductTypeController::class, 'RemoveProductType'])->name('remove-producttypes');
    Route::get('product-type/active/{id}', [ProductTypeController::class, 'ActiveProductType'])->name('active-product-type');
});

//Đơn Vị Vận Chuyển
Route::prefix('transports')->group(function () {
    Route::get('/', [TranSportController::class, 'ShowIndexTranSport'])->name('index-transports');
    Route::get('/create', [TranSportController::class, 'ShowCreateTranSport'])->name('create-transports');
    Route::POST('/add', [TranSportController::class, 'AddTranSports'])->name('add-transports');
    Route::get('/{id}', [TranSportController::class, 'EditTranSport'])->name('edit-transports');
    Route::put('/{id}', [TranSportController::class, 'UpdateTranSport'])->name('update-transports');
    Route::delete('/{id}', [TranSportController::class, 'RemoveTranSport'])->name('remove-transports');
    Route::get('transport/active/{id}', [TranSportController::class, 'ActiveTranSport'])->name('transport-active');
});

//Nhà Cung Cấp
Route::prefix('suppliers')->group(function () {
    Route::get('/', [SupplierController::class, 'ShowIndexSuppliers'])->name(name: 'index-suppliers');
    Route::get('/create', [SupplierController::class, 'ShowCreateSuppliers'])->name('create-suppliers');
    Route::POST('/add', [SupplierController::class, 'AddSuppliers'])->name('add-suppliers');
    Route::get('/{id}', [SupplierController::class, 'ShowEditSuppliers'])->name('edit-suppliers');
    Route::put('/{id}', [SupplierController::class, 'UpdateSuppliers'])->name('update-suppliers');
    Route::delete('/{id}', [SupplierController::class, 'RemoveSuppliers'])->name('remove-suppliers');
});

//Danh Sách Yêu Thích
Route::prefix('favorites')->group(function () {
    Route::get('/', [FavoriteController::class, 'ShowIndexFavorite'])->name('index-favorites');
    Route::post('/add', [FavoriteController::class, 'AddToFavorite'])->name('add-favorites');
    Route::delete('/{id}', [FavoriteController::class, 'DeleteFavorite'])->name('delete-favorites');
});

//Thanh Toán
Route::prefix('pays')->group(function () {
    Route::get('/', [PayController::class, 'ShowPayIndex'])->name('index-pays');
    Route::get('/view', [PayController::class, 'ViewPay'])->name('view-pays');
    Route::get('/{id}', [PayController::class, 'EditPay'])->name('edit-pays');
    Route::post('/add', [PayController::class, 'AddPay'])->name('add-pays');
    Route::get('pays/{id}/update-status/{status}', [OdersController::class, 'updateStatus'])->name('pays.updateStatus');
});

//Đặt Hàng
Route::prefix('orders')->group(function () {
    Route::get('/', [OdersController::class, 'ShowIndexOders'])->name('index-orders');
    Route::get('/view', [OdersController::class, 'ShowViewOders'])->name('view-orders');
    Route::get('/{id}', [OdersController::class, 'EditOrders'])->name('edit-orders');
    Route::delete('/{id}', [OdersController::class, 'DeleteOrders'])->name('delete-orders');
    Route::get('orders/active/{id}', [OdersController::class, 'ActiveOrders'])->name('active-orders');
});

//Giỏ Hàng
Route::prefix('carts')->group(function () {
    Route::get('/', [UserController::class, 'ShowUserCart'])->name('index-cart');
    Route::post('/add', [CartController::class, 'AddToCart'])->name('add.to.cart');
    Route::delete('/{id}', [CartController::class, 'RemoveFromCart'])->name('carts-remove');
});

//Danh mục Sản Phẩm
Route::prefix('categories')->group(function () {
    Route::get('/', [AdminCategoryProductController::class, 'showCategory'])->name('indexcategory');
    Route::get('/create', [AdminCategoryProductController::class, 'showAddCategory'])->name('create-category');
    Route::post('/admin/categories/store', [AdminCategoryProductController::class, 'storeCategory'])->name('store-category');
    Route::get('edit-category/{id}', [AdminCategoryProductController::class, 'showEditCategory'])->name('editcategory');
    Route::post('update-category/{id}', [AdminCategoryProductController::class, 'updateCategory'])->name('update-category');
    Route::delete('/admin/categories/delete/{id}', [AdminCategoryProductController::class, 'destroyCategory'])->name('deletecategory');
    Route::get('/admin/categories/active/{id}', [AdminCategoryProductController::class, 'toggleActiveCategory'])->name('activecategory');
    Route::get('category-products/search', [SearchController::class, 'search'])->name('category-products.search');
    Route::get('category-products/search-selective', [SearchController::class, 'SearchSelective'])->name('category-products.search-selective');
});

//Sản Phẩm
Route::prefix('product')->group(function () {
    Route::get('/', [AdminProductController::class, 'ShowIndexProduct'])->name('index-product');
    Route::get('/create', [AdminProductController::class, 'ShowCreateProduct'])->name(name: 'create-product');
    Route::post('/add', [AdminProductController::class, 'store'])->name('products.store');
    Route::get('/{id}', [AdminProductController::class, 'ShowUpdateProduct'])->name('products.edit');
    Route::put('/{id}', [AdminProductController::class, 'update'])->name('products.update');
    Route::delete('/{id}', [AdminProductController::class, 'destroy'])->name('products.destroy');
});

//Tài Khoản Người Dùng
Route::prefix('account')->group(function () {
    Route::get('/', action: [AccountController::class, 'ShowAccount'])->name('index-account');
    Route::get('/create', [AccountController::class, 'ShowAddAccount'])->name('create-account');
    Route::post('/add', [AccountController::class, 'AddAccount'])->name('add-account');
    Route::get('/{id}', [AccountController::class, 'edit'])->name('edit-account');
    Route::post('/{id}', [AccountController::class, 'update'])->name('update-account');
    Route::delete('/{id}', [AccountController::class, 'destroy'])->name('remove-account');
    Route::post('/toggle-active/{id}', [AccountController::class, 'toggleActive'])->name('toggle-active');
});

//Bài Viết Admin
Route::prefix('post')->group(function () {
    Route::get('/', [PostController::class, 'ShowIndexPost'])->name('index-post');
    Route::get('/list', [PostController::class, 'ShowIndexPostHomePage'])->name('index-post-user');
    Route::get('/create', [PostController::class, 'ShowCreatePost'])->name('create-post');
    Route::post('/add', [PostController::class, 'AddPost'])->name('add-posts');
    Route::delete('/{id}', [PostController::class, 'DeletePost'])->name('delete-posts');
});

//Danh Mục Bài Viết
Route::prefix('category-post')->group(function () {
    Route::get('/', [CategoryPostController::class, 'ShowIndexCategoryPost'])->name('index-category-post');
    Route::get('/create', [CategoryPostController::class, 'ShowCreateCategoryPost'])->name('create-category-post');
});

//Quên Mật Khẩu
Route::prefix('forgot')->group(function () {
    Route::get('/', [ForgotPassController::class, 'ShowIndexForgot'])->name('index-forgot');
    Route::post('/', [ForgotPassController::class, 'sendResetLink'])->name('send-reset-link');
    Route::get('/update/{token}', [ForgotPassController::class, 'ShowUpdatePasswordForgot'])->name('password.reset');
    Route::post('/update', [ForgotPassController::class, 'resetPassword'])->name('password.update');
    Route::get('/check', [ForgotPassController::class, 'ShowCheckMail'])->name('CheckMail');
});

//Profile (Hồ Sơ Người Dùng)
Route::prefix('profile')->group(function () {
    Route::get('/', [ProFileController::class, 'index'])->name('index-profile');
    Route::post('/{id}', [ProFileController::class, 'update'])->name('update-profile');
    Route::post('/update-password', [ProFileController::class, 'updatePassword'])->name('update-password');
});
Route::post('/{id}', [ProFileController::class, 'UpdateImage'])->name('update-image');


//Thông Kê Biểu Đồ
Route::prefix('statistical')->group(function () {
    Route::get('/', [StatisticalController::class, 'ShowIndexStatistical'])->name('index-statistical');
});

//Đánh Giá Sản Phẩm
Route::prefix('review')->group(function () {
    Route::get('/', [ReviewController::class, 'ShowIndexReview'])->name('index-review');
});


