<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexProfileController;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard');

// Admin routes
Route::group(['prefix'=> 'admin'],function(){

	Route::get('/logout', [AdminController::class, 'destroy'])->name('admin.logout');

    Route::get('/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
    
    Route::get('/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
    
    Route::post('/profile/update', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');

    Route::get('/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');

    Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('admin.update.change.password');

});

//User routes

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard',compact('user'));
})->name('dashboard');

Route::get('/', [IndexProfileController::class, 'index']);
Route::get('/user/logout', [IndexProfileController::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile', [IndexProfileController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/store', [IndexProfileController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('/user/change/password', [IndexProfileController::class, 'UserChangePassword'])->name('change.password');

Route::post('/user/password/update', [IndexProfileController::class, 'UserPasswordUpdate'])->name('user.password.update');


// brand routes
Route::prefix('brand')->group(function(){

    Route::get('/view', [BrandController::class, 'BrandView'])->name('brand.all');
    
    Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');

    Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');

    Route::post('/update/{id}', [BrandController::class, 'BrandUpdate'])->name('brand.update');

    Route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');
});


// Admin Category All Routes

Route::prefix('category')->group(function(){

    Route::get('/view', [CategoryController::class, 'CategoryView'])->name('category.all');
    
    Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');

    Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');

    Route::post('/update/{id}', [CategoryController::class, 'CategoryUpdate'])->name('category.update');

    Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');

    // Admin Sub Category All Routes

    Route::get('/sub/view', [SubCategoryController::class, 'SubCategoryView'])->name('subcategory.all');
    
    Route::post('/sub/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');

    Route::get('/sub/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');

    Route::post('/sub/update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');

    Route::get('/sub/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');

    // Admin Sub sub category all routes

    Route::get('/sub/sub/view', [SubCategoryController::class, 'SubSubCategoryView'])->name('subsubcategory.all');
    
    Route::post('/sub/sub/store', [SubCategoryController::class, 'SubSubCategoryStore'])->name('subsubcategory.store');

    Route::get('/sub/sub/edit/{id}', [SubCategoryController::class, 'SubSubCategoryEdit'])->name('subsubcategory.edit');

    Route::post('/sub/update', [SubCategoryController::class, 'SubSubCategoryUpdate'])->name('subsubcategory.update');

    Route::get('/sub/sub/delete/{id}', [SubCategoryController::class, 'SubSubCategoryDelete'])->name('subsubcategory.delete');

    Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);
    
    Route::get('/sub-subcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'GetSubSubCategory']);

});


// Product All Routes
Route::prefix('product')->group(function(){

    Route::get('/add', [ProductController::class, 'AddProduct'])->name('add.product');

    Route::post('/store', [ProductController::class, 'ProductStore'])->name('product.store');

    Route::get('/manage', [ProductController::class, 'ProductManage'])->name('product.manage');

    Route::get('/edit/{id}', [ProductController::class, 'ProductEdit'])->name('product.edit');

    Route::post('data/update', [ProductController::class, 'ProductDataUpdate'])->name('product.update');

    Route::get('/delete', [ProductController::class, 'ProductDelete'])->name('product.delete');

    Route::post('/image/update', [ProductController::class, 'ProductMultiImageUpdate'])->name('product.image.update');

    Route::post('/thumbnail/update', [ProductController::class, 'ProductThumbnailUpdate'])->name('product.thumbnail.update');
});