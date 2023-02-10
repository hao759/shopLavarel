<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\HomeController;
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
Route::get('/all_brand_product', [BrandProduct::class, 'allCategoryProduct']);

Route::post('/save_brand_product', [BrandProduct::class, 'saveBrandProduct']);
Route::get('/edit_category_product/{brand_id}', [BrandProduct::class, 'editCategoryProduct']);

Route::post('/update_category_product/{brand_id}', [BrandProduct::class, 'updateCategoryProduct']);
Route::get('/delete_category_product/{brand_id}', [BrandProduct::class, 'deleteCategoryProduct']);

Route::get('/active-category-product/{brand_id}', [BrandProduct::class, 'active_category_product']);
Route::get('/unactive-category-product/{brand_id}', [BrandProduct::class, 'unactive_category_product']);