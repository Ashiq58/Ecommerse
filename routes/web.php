<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'Front\FrontController@index')->name('home');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::get('/dashboard','Admin\AdminController@index')->name('dashboard');
    // Category Route
    Route::get('/category','Admin\CategoryController@createCategory')->name('category.create');
    Route::post('/category-add','Admin\CategoryController@storeCategory')->name('category.store');
    Route::get('/category-manage','Admin\CategoryController@manageCategory')->name('category.manage');
    Route::get('/category-edit/{id}','Admin\CategoryController@editCategory')->name('category.edit');
    Route::post('/category-update','Admin\CategoryController@updateCategory')->name('category.update');
    Route::get('/category-delete/{id}','Admin\CategoryController@deleteCategory')->name('category.delete');
    // SubCategory
    Route::get('/subCategory','Admin\SubCategoryController@createSubCategory')->name('subCategory.create');
    Route::post('/subCategory-add','Admin\SubCategoryController@storeSubCategory')->name('subCategory.store');
    Route::get('/subCategory-manage','Admin\SubCategoryController@manageSubCategory')->name('subCategory.manage');
    Route::get('/subCategory-edit/{id}','Admin\SubCategoryController@editSubCategory')->name('subCategory.edit');
    Route::post('/subCategory-update','Admin\SubCategoryController@updateSubCategory')->name('subCategory.update');
    Route::get('/subCategory-delete/{id}','Admin\SubCategoryController@deleteSubCategory')->name('subCategory.delete');
    //Brand
    Route::get('/brand','Admin\BrandController@createBrand')->name('brand.create');
    Route::post('/brand-add','Admin\BrandController@storeBrand')->name('brand.store');
    Route::get('/brand-manage','Admin\BrandController@manageBrand')->name('brand.manage');
    Route::get('/brand-edit/{id}','Admin\BrandController@editBrand')->name('brand.edit');
    Route::post('/brand-update','Admin\BrandController@updateBrand')->name('brand.update');
    Route::get('/brand-delete/{id}','Admin\BrandController@deleteBrand')->name('brand.delete');

});
