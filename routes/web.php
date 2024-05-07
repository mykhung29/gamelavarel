<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GameCategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckAdmin;


use Illuminate\Support\Facades\Route;


//home
Route::get('/', [HomeController::class, 'index']);
Route::get('/category/{category_name}', [HomeController::class, 'category']);


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
//type product
Route::get('/add-type', [GameCategoryController::class, 'create']);
Route::get('/show-type', [GameCategoryController::class, 'index']);
Route::post('/save-type', [GameCategoryController::class, 'store']);
Route::get('/delete-type/{id}', [GameCategoryController::class, 'delete']);
//orders
Route::get('/show-orders', [OrderController::class, 'showOrders']);
Route::get('/show-order-detail/{id_order}/{user_id}/{place_id}', [OrderController::class, 'showOrderDetail']);
Route::get('/sort', [OrderController::class, 'sort']);

// // user

Route::get('/register', [UserController::class, 'index']);
Route::post('/create', [UserController::class, 'create']);
Route::post('/login-check', [UserController::class, 'login']);
Route::get('/logout_user', [UserController::class, 'logout']);
Route::post('/add-cart/{product_id}', [UserController::class, 'add_to_cart']);
Route::get('/show_cart', [UserController::class, 'cart']);
Route::get('/delete-product-cart/{id}', [UserController::class, 'delete_to_cart']);
Route::post('/checkout', [UserController::class, 'checkout']);
Route::get('/edit_info', [UserController::class, 'edit_info']);
Route::get('/edit_place', [UserController::class, 'edit_place']);
Route::post('/add-place-ship', [UserController::class, 'add_place_ship']);
Route::get('/delete_place/{id}', [UserController::class, 'delete_place']);



// // san pham

Route::get('/moreinfor/{product_id}', [HomeController::class, 'detail']);
Route::get('/login', [HomeController::class, 'login']);

