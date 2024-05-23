<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GameCategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\GoogleLoginController;
use Illuminate\Support\Facades\Route;


//home
Route::get('/', [HomeController::class, 'index']);
Route::get('/category/{category_name}', [HomeController::class, 'category']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/login', [HomeController::class, 'login']);
Route::get('/search', [HomeController::class, 'search']);
Route::get('/type/{type}', [HomeController::class, 'type_product']);

// // admin
Route::get('/admin', [AdminController::class, 'login']);
Route::get('/dashbroad', [AdminController::class, 'index']);
Route::post('/admin-dashbroad', [AdminController::class, 'login_check']);
Route::get('/logout', [AdminController::class, 'logout']);

// // category product
Route::get('/add-category-product', [CategoryController::class, 'addCategoryProduct']);
Route::get('/show-category-product', [CategoryController::class, 'showCategoryProduct']);
Route::post('/save-category-product', [CategoryController::class, 'saveCategoryProduct']);
Route::get('/active-category-product/{category_id}', [CategoryController::class, 'activeCategoryProduct']);
Route::get('/unactive-category-product/{category_id}', [CategoryController::class, 'unactiveCategoryProduct']);
Route::get('/delete-category-product/{category_id}', [CategoryController::class, 'deleteCategoryProduct']);
Route::get('/edit-category-product/{category_id}', [CategoryController::class, 'editCategoryProduct']);
Route::post('/update-category-product/{category_id}', [CategoryController::class, 'updateCategoryProduct']);
// // product
Route::get('/add-product', [ProductController::class, 'addProduct']);
Route::get('/show-product', [ProductController::class, 'showProduct']);
Route::post('/save-product', [ProductController::class, 'saveProduct']);
Route::get('/active-product/{product_id}', [ProductController::class, 'activeProduct']);
Route::get('/unactive-product/{product_id}', [ProductController::class, 'unactiveProduct']);
Route::get('/delete-product/{product_id}', [ProductController::class, 'deleteProduct']);
Route::get('/edit-product/{product_id}', [ProductController::class, 'editProduct']);
Route::post('/update-product/{product_id}', [ProductController::class, 'updateProduct']);
Route::get('/manager-product', [ProductController::class, 'managerProduct']);
Route::post('/store-inventory', [ProductController::class, 'storeInventory']);
//voucher
Route::get('/show-voucher', [VoucherController::class, 'showVoucher']);
//type product
Route::get('/add-type', [GameCategoryController::class, 'create']);
Route::get('/show-type', [GameCategoryController::class, 'index']);
Route::post('/save-type', [GameCategoryController::class, 'store']);
Route::get('/delete-type/{id}', [GameCategoryController::class, 'delete']);
//orders
Route::get('/show-orders', [OrderController::class, 'showOrders']);
Route::get('/show-order-detail/{id_order}/{user_id}/{place_id}', [OrderController::class, 'showOrderDetail']);
// Route::get('/sort', [OrderController::class, 'sort']);
Route::post('/update_status/{id_order}', [OrderController::class, 'updateStatus']);
// // user
Route::get('/register', [UserController::class, 'index']);
Route::post('/create', [UserController::class, 'create']);
Route::post('/login-check', [UserController::class, 'login']);
Route::get('/logout_user', [UserController::class, 'logout']);
Route::get('/real_email/{email}', [UserController::class, 'real_email_form']);
Route::post('/confirm_email', [UserController::class, 'confirm_email']);

//pass
Route::post('/change_pass', [UserController::class, 'change_pass']);
Route::get('/forgot_pass', [UserController::class, 'forgot_password']);
Route::post('/send-email', [UserController::class, 'send_email']);
Route::post('/check-token', [UserController::class, 'check_token']);
Route::post('/reset-pass', [UserController::class, 'reset_pass']);


// // cart
Route::post('/add-cart/{product_id}', [UserController::class, 'add_to_cart']);
Route::get('/show_cart', [UserController::class, 'cart']);
Route::get('/delete-product-cart/{id}', [UserController::class, 'delete_to_cart']);
Route::post('/checkout', [UserController::class, 'checkout']);
Route::get('/show_order', [UserController::class, 'show_order']);
//edit info, place
Route::get('/show_info', [UserController::class, 'show_info']);
Route::get('/edit_place', [UserController::class, 'edit_place']);
Route::post('/add-place-ship', [UserController::class, 'add_place_ship']);
Route::get('/delete_place/{id}', [UserController::class, 'delete_place']);
Route::post('/edit_info', [UserController::class, 'edit_info']);

// // san pham
Route::get('/moreinfor/{product_id}', [HomeController::class, 'detail']);

//login with google
Route::get('auth/google', [GoogleLoginController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleLoginController::class, 'handleGoogleCallback']);