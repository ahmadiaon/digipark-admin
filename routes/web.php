<?php

use App\Http\Controllers\AdminManageSlideController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminManageUserController;
use App\Http\Controllers\AdminManageUserResourceController;
use App\Http\Controllers\ManageAdminController;
use App\Http\Controllers\ManageBusinessCategoryController;
use App\Http\Controllers\ManageBusinessController;
use App\Http\Controllers\ManageCommunityCategoryController;
use App\Http\Controllers\ManageCommunityController;
use App\Http\Controllers\ManageGalerryController;
use App\Http\Controllers\ManageNewsController;
use App\Http\Controllers\ManageSlideController;
use App\Http\Controllers\ManageTourController;
use App\Http\Controllers\ManageUserController;
use App\Models\User;
use Yajra\Datatables\Datatables;
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

Route::get('/', [DashboardController::class, 'index']);
Route::resource('/users', ManageUserController::class);

Route::resource('slides', AdminManageSlideController::class);
Route::get('/data', [ManageUserController::class, 'anyData'])->name('data');

Route::resource('/gallery', ManageGalerryController::class);
Route::get('/galleries-data', [ManageGalerryController::class, 'anyData'])->name('galleries_data');

Route::resource('/admin', ManageAdminController::class);
Route::get('/admin-data', [ManageAdminController::class, 'anyData'])->name('admin-data');


Route::resource('/slide', ManageSlideController::class);
Route::get('/slide-data', [ManageSlideController::class, 'anyData'])->name('slide-data');

Route::resource('/news', ManageNewsController::class);
Route::get('/news-data', [ManageNewsController::class, 'anyData'])->name('news-data');

Route::resource('/business-category', ManageBusinessCategoryController::class);
Route::get('/business-category-data', [ManageBusinessCategoryController::class, 'anyData'])->name('business-category-data');

Route::resource('/business', ManageBusinessController::class);
Route::get('/business-data', [ManageBusinessController::class, 'anyData'])->name('business-data');

Route::resource('/tour', ManageTourController::class);
Route::get('/tour-data', [ManageTourController::class, 'anyData'])->name('tour-data');

Route::resource('/community-category', ManageCommunityCategoryController::class);
Route::get('/community-category-data', [ManageCommunityCategoryController::class, 'anyData'])->name('community-category-data');

Route::resource('/community', ManageCommunityController::class);
Route::get('/community-data', [ManageCommunityController::class, 'anyData'])->name('community-data');
