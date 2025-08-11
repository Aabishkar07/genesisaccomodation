<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\AccommodationController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\RoomTypeController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\LegalPageController;
use App\Http\Controllers\Admin\AdminAuthController;
use Illuminate\Support\Facades\Route;

// Admin authentication routes (outside middleware group)
Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('login', [AdminAuthController::class, 'login'])->name('admin.login.post');

// Protected admin routes
Route::middleware(["admin"])->group(function () {
    // Logout route
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Redirect /admin to /admin/dashboard
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });

    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

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
    Route::get('contacts', [ContactController::class, 'contact'])->name('admin.contact');
    Route::delete('contactdelete/{contact}', [ContactController::class, 'contactdelete'])->name('contactdelete');
    Route::get('/admin/contacts/export', [ContactController::class, 'export'])->name('admin.contacts.export');

    // Bookings
    Route::resource('bookings', BookingController::class)->only(['index', 'show'])->names([
        'index' => 'admin.bookings.index',
        'show' => 'admin.bookings.show',
    ]);

    // Booking status management
    Route::put('bookings/{booking}/status', [BookingController::class, 'updateStatus'])->name('admin.bookings.update-status');
    Route::put('bookings/{booking}/approve', [BookingController::class, 'approve'])->name('admin.bookings.approve');
    Route::put('bookings/{booking}/reject', [BookingController::class, 'reject'])->name('admin.bookings.reject');
    Route::get('bookings/export', [BookingController::class, 'export'])->name('admin.bookings.export');

    // Banners
    Route::resource('banners', BannerController::class)->names([
        'index' => 'admin.banners.index',
        'create' => 'admin.banners.create',
        'store' => 'admin.banners.store',
        'show' => 'admin.banners.show',
        'edit' => 'admin.banners.edit',
        'update' => 'admin.banners.update',
        'destroy' => 'admin.banners.destroy',
    ]);

    // Legal Pages
    Route::resource('legal-pages', LegalPageController::class)->names([
        'index' => 'admin.legal-pages.index',
        'create' => 'admin.legal-pages.create',
        'store' => 'admin.legal-pages.store',
        'show' => 'admin.legal-pages.show',
        'edit' => 'admin.legal-pages.edit',
        'update' => 'admin.legal-pages.update',
        'destroy' => 'admin.legal-pages.destroy',
    ]);

    // Legal Pages Toggle Status
    Route::put('legal-pages/{legalPage}/toggle-status', [LegalPageController::class, 'toggleStatus'])->name('admin.legal-pages.toggle-status');

});
