<?php

use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\IndexController;
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
Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/blog/{blog:slug}', [IndexController::class, 'single'])->name('single');
Route::get('/aboutus', [IndexController::class, 'aboutus'])->name('aboutus');
Route::get('/services', [IndexController::class, 'services'])->name('services');
Route::get('/blogs', [IndexController::class, 'blogs'])->name('blogs');
Route::get('/contact', [IndexController::class, 'contact'])->name('contact');
Route::post('/contact', [IndexController::class, 'store'])->name('contact.store');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'storeuser'])->name('user.register');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'customerlogin'])->name('customerlogin');

Route::get('forgotpassword', [AuthController::class, 'forgotpassword'])->name('forgotpassword');
Route::post('forgotpassword', [AuthController::class, 'checkemail'])->name('checkemail');
Route::get('checkotp/{checkotp}', [AuthController::class, 'viewcheckotp'])->name('viewcheckotp');
Route::post('checkotp/{checkotp}', [AuthController::class, 'checkotp'])->name('checkotp');
Route::get('changepassword/{getchangepassword}', [AuthController::class, 'getchangepassword'])->name('getchangepassword');
Route::post('changepassword/{changepassword}', [AuthController::class, 'changepassword'])->name('changepassword');

Route::get('/accommodations', [IndexController::class, 'accommodations'])->name('accommodations');
Route::get('/accommodation/{accommodation:slug}', [IndexController::class, 'accommodationSingle'])->name('accommodation.single');


