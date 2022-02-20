<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BrandController;
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

    Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brand');
    
    Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');

    Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');

    Route::post('/update/{id}', [BrandController::class, 'BrandUpdate'])->name('brand.update');

    Route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');
});

