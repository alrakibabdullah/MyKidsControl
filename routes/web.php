<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ChildController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\WebsiteController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\EmailMarketingController;
use App\Http\Controllers\Admin\SchoolController;
use App\Http\Controllers\Admin\SchoolPaymentController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\School\ParentControler;
use App\Http\Controllers\School\SchoolControler;
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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->group(function (){
    Route::get('/login', [AdminController::class, 'login']);
    Route::post('/login', [AdminController::class, 'admin_login'])->name('admin-login');
    Route::get('/logout', [AdminController::class, 'admin_logout'])->name('admin-logout');
    Route::group(['middleware' => ['AdminUserMiddleWare']], function () {
        Route::get('/dashboard', [AdminController::class, 'home'])->name('dashboard');
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
        Route::post('/profile', [AdminController::class, 'save_profile'])->name('save-profile');
        Route::get('/change-password', [AdminController::class, 'change_password'])->name('change-password');
        Route::post('/save-password', [AdminController::class, 'save_password'])->name('save-password');
        //country
        Route::resource('country', CountryController::class);
        Route::get('/country/active/{id}', [CountryController::class, 'active'])->name('active-country');
        Route::get('/country/inactive/{id}', [CountryController::class, 'inactive'])->name('inactive-country');
        //website
        Route::resource('website', WebsiteController::class);
        //customer
        Route::resource('customer', CustomerController::class);
        Route::get('/customer/active/{id}', [CustomerController::class, 'active'])->name('active-customer');
        Route::get('/customer/inactive/{id}', [CustomerController::class, 'inactive'])->name('inactive-customer');
        //child
        Route::resource('child', ChildController::class);
        Route::post('parent-profile', [ChildController::class, 'parent'])->name('parent-profile');
        Route::get('children-list/{id}', [ChildController::class, 'children_list'])->name('children-list');
        Route::post('child-profile', [ChildController::class, 'child'])->name('child-profile');
        Route::get('inactive-user', [ChildController::class, 'inactive_user'])->name('inactive-user');
        Route::post('email-marketing', [EmailMarketingController::class, 'email_marketing'])->name('email-marketing');
        Route::get('email-template', [EmailMarketingController::class, 'email_template'])->name('email-template');
        Route::post('save.email-details', [EmailMarketingController::class, 'email_details'])->name('save.email-details');
        //discount
        Route::resource('discount', DiscountController::class);
        //school
        Route::resource('school', SchoolController::class);
        Route::resource('payment', SchoolPaymentController::class);
        
        //website setting
        Route::get('/site-setting', [SettingController::class, 'setting'])->name('site-setting');
        Route::post('/save-logo', [SettingController::class, 'save_logo'])->name('save-logo');
        Route::post('/save-favicon', [SettingController::class, 'save_favicon'])->name('save-favicon');
    });
});

Route::prefix('school')->group(function (){
    Route::get('/login', [SchoolControler::class, 'login']);
    Route::post('/login', [SchoolControler::class, 'save_login'])->name('school-login');
    Route::group(['middleware' => ['SchoolMiddleWare']], function () {
        Route::get('/logout', [SchoolControler::class, 'logout'])->name('school-logout');
        Route::get('/dashboard', [SchoolControler::class, 'home'])->name('school-dashboard');
        Route::get('/change-password', [SchoolControler::class, 'change_password'])->name('school-change-password');
        Route::post('/save-password', [SchoolControler::class, 'save_password'])->name('school-save-password');
        Route::get('/payment.history', [SchoolControler::class, 'payment_history'])->name('payment.history');
        //customer
        Route::resource('school-customer', ParentControler::class);
    });
});