<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/home', 'HomeController@index');
Route::get('/home', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'index']);


Route::get('/showByDanhMuc/{category_id}', [HomeController::class, 'showByDanhMuc']);
Route::get('/chi_tiet_san_pham/{product_id}', [HomeController::class, 'showChiTietSanPham']);









Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'showDashboard']);
Route::post('/admin_dashboard', [AdminController::class, 'dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);


//Category 
Route::get('/add_category_product', [CategoryProduct::class, 'addCategoryProduct']);
Route::get('/all_category_product', [CategoryProduct::class, 'allCategoryProduct']);


Route::post('/save_category_product', [CategoryProduct::class, 'saveCategoryProduct']);
Route::get('/edit_category_product/{category_id}', [CategoryProduct::class, 'editCategoryProduct']);


Route::post('/update_category_product/{category_id}', [CategoryProduct::class, 'updateCategoryProduct']);
Route::get('/delete_category_product/{category_id}', [CategoryProduct::class, 'deleteCategoryProduct']);

// http://localhost:8080/shopLavarel/active-category-product/3
Route::get('/active-category-product/{category_id}', [CategoryProduct::class, 'active_category_product']);
Route::get('/unactive-category-product/{category_id}', [CategoryProduct::class, 'unactive_category_product']);



//Brand Product 
Route::get('/add_brand_product', [BrandProduct::class, 'addBrandProduct']);
Route::get('/all_brand_product', [BrandProduct::class, 'allBrandProduct']);

Route::post('/save_brand_product', [BrandProduct::class, 'saveBrandProduct']);
Route::get('/edit_brand_product/{brand_id}', [BrandProduct::class, 'editBrandProduct']);

Route::post('/update_brand_product/{brand_id}', [BrandProduct::class, 'updateBrandProduct']);
Route::get('/delete_brand_product/{brand_id}', [BrandProduct::class, 'deleteBrandProduct']);

Route::get('/active-brand-product/{brand_id}', [BrandProduct::class, 'active_brand_product']);
Route::get('/unactive-brand-product/{brand_id}', [BrandProduct::class, 'unactive_brand_product']);




// Product 
Route::get('/add_product', [ProductController::class, 'addProduct']);
Route::get('/all_product', [ProductController::class, 'allProduct']);

Route::post('/save_product', [ProductController::class, 'saveProduct']);
Route::get('/edit_brand_product/{product_id}', [ProductController::class, 'editBrandProduct']);

Route::post('/update_brand_product/{product_id}', [ProductController::class, 'updateBrandProduct']);
Route::get('/delete_product/{product_id}', [ProductController::class, 'deleteProduct']);

Route::get('/active-product/{product_id}', [ProductController::class, 'active_product']);
Route::get('/unactive-product/{product_id}', [ProductController::class, 'unactive_product']);





//Cart
Route::post('/saveCart', [CartController::class, 'saveCart']);
Route::get('/show_Cart', [CartController::class, 'showCart']);
Route::get('/deleteCart/{rowId}', [CartController::class, 'delete_Cart']); 
Route::post('/updata_Cart', [CartController::class, 'updata_Cart']);


// Checkout
Route::get('/login_checkout', [CheckoutController::class, 'login_checkout']);//hiện user đăng nhập vs đki
Route::get('/checkout', [CheckoutController::class, 'checkout']);      //Điền thông tin gửi hàng
Route::get('/save_checkout', [CheckoutController::class, 'save_checkout']);//nhận cái trên
Route::post('/add_customer', [CheckoutController::class, 'add_customer']);//
Route::post('/user-login', [CheckoutController::class, 'userLogin']);//user đăng nhập
Route::get('/user_logout', [CheckoutController::class, 'user_logout']);

Route::get('/payment', [CheckoutController::class, 'payment']);

