<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\AccommodationController;
use App\Http\Controllers\Admin\RoomTypeController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

// Admin login route (outside middleware group for now)
Route::get('login', function () {
    return view('admin.auth.login');
})->name('admin.login');

Route::middleware(["admin"])->group(function () {

    // Redirect /admin to /admin/dashboard
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Blogs
    Route::resource('blogs', BlogController::class)->names([
        'index' => 'admin.blogs.index',
        'create' => 'admin.blogs.create',
        'store' => 'admin.blogs.store',
        'show' => 'admin.blogs.show',
        'edit' => 'admin.blogs.edit',
        'update' => 'admin.blogs.update',
        'destroy' => 'admin.blogs.destroy',
    ]);

    // About Us
    Route::resource('about-us', AboutUsController::class)->names([
        'index' => 'admin.about-us.index',
        'create' => 'admin.about-us.create',
        'store' => 'admin.about-us.store',
        'show' => 'admin.about-us.show',
        'edit' => 'admin.about-us.edit',
        'update' => 'admin.about-us.update',
        'destroy' => 'admin.about-us.destroy',
    ]);

    // Services
    Route::resource('services', ServiceController::class)->names([
        'index' => 'admin.services.index',
        'create' => 'admin.services.create',
        'store' => 'admin.services.store',
        'show' => 'admin.services.show',
        'edit' => 'admin.services.edit',
        'update' => 'admin.services.update',
        'destroy' => 'admin.services.destroy',
    ]);

    // Accommodations
    Route::resource('accommodations', AccommodationController::class)->names([
        'index' => 'admin.accommodations.index',
        'create' => 'admin.accommodations.create',
        'store' => 'admin.accommodations.store',
        'show' => 'admin.accommodations.show',
        'edit' => 'admin.accommodations.edit',
        'update' => 'admin.accommodations.update',
        'destroy' => 'admin.accommodations.destroy',
    ]);

    // Room Types
    Route::resource('room_types', RoomTypeController::class)->names([
        'index' => 'admin.room_types.index',
        'create' => 'admin.room_types.create',
        'store' => 'admin.room_types.store',
        'show' => 'admin.room_types.show',
        'edit' => 'admin.room_types.edit',
        'update' => 'admin.room_types.update',
        'destroy' => 'admin.room_types.destroy',
    ]);

    // Testimonials
    Route::resource('testimonials', TestimonialController::class)->names([
        'index' => 'admin.testimonials.index',
        'create' => 'admin.testimonials.create',
        'store' => 'admin.testimonials.store',
        'show' => 'admin.testimonials.show',
        'edit' => 'admin.testimonials.edit',
        'update' => 'admin.testimonials.update',
        'destroy' => 'admin.testimonials.destroy',
    ]);

    // Settings
    Route::resource('settings', SettingController::class)->names([
        'index' => 'admin.settings.index',
        'create' => 'admin.settings.create',
        'store' => 'admin.settings.store',
        'show' => 'admin.settings.show',
        'edit' => 'admin.settings.edit',
        'update' => 'admin.settings.update',
        'destroy' => 'admin.settings.destroy',
    ]);

    // Settings bulk update
    Route::put('settings/bulk-update', [SettingController::class, 'bulkUpdate'])->name('admin.settings.bulk-update');

});
