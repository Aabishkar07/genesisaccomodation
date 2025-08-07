<?php

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

// Accommodation routes
Route::get('/accommodations', [IndexController::class, 'accommodations'])->name('accommodations');
Route::get('/accommodation/{accommodation:slug}', [IndexController::class, 'accommodationSingle'])->name('accommodation.single');


