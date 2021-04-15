<?php

use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\ParentController;
use App\Http\Controllers\Api\SchoolController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
    


Route::post('/website/add', [HomeController::class, 'save_website']);
Route::get('/websites', [HomeController::class, 'website']);
Route::post('/apps/add', [HomeController::class, 'save_apps']);
Route::get('/apps', [HomeController::class, 'apps']);
Route::get('/parent', [HomeController::class, 'customers']);
Route::get('/countries', [HomeController::class, 'countries']);
Route::get('/setting', [HomeController::class, 'logo']);
Route::post('/contact-us', [HomeController::class, 'contact']);
Route::get('/app/category', [HomeController::class, 'app_category']);
Route::get('/website/category', [HomeController::class, 'web_category']);

Route::post('/schedule', [HomeController::class, 'save_schedule']);

Route::get('child/schedule', [UserController::class, 'schedule']);

Route::post('/child/register', [UserController::class, 'register']);
Route::post('/child/login', [UserController::class, 'child_login']);
Route::post('/child/update/{id}', [UserController::class, 'update']);


//parent
Route::post('/parent/login', [ParentController::class, 'parent_login']);
Route::post('/parent/register', [ParentController::class, 'register']);
Route::post('/parent/update/{id}', [ParentController::class, 'update']);

//school
Route::post('/school/register', [SchoolController::class, 'register']);
Route::post('/school/login', [SchoolController::class, 'login']);

