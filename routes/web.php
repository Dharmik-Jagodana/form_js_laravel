<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminSettingController;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    // AdminHomeController
    Route::get('dashboard', [AdminHomeController::class, 'index'])->name('admin.home');

    // UserController
    Route::resource('user', UserController::class);
    Route::get('prifile', [UserController::class, 'profile'])->name('admin.profile');
    Route::post('prifile-update', [UserController::class,'updateProfile'])->name('profile.update');

    // AdminSettingController
    Route::get('/admin/admin-setting', [AdminSettingController::class ,'index'])->name('admin.setting');
    Route::put('/admin/admin-setting-update', [AdminSettingController::class ,'update'])->name('admin.setting.update');
});