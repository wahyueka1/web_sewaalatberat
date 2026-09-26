<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EquipmentController as AdminEquipmentController;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;
use App\Http\Controllers\Admin\CompanyProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES (tanpa login/autentikasi)
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('about');

Route::get('/alat', [EquipmentController::class, 'index'])->name('equipment.index');
Route::get('/alat/{equipment:slug}', [EquipmentController::class, 'show'])->name('equipment.show');

Route::get('/portofolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/portofolio/{portfolio:slug}', [PortfolioController::class, 'show'])->name('portfolio.show');

// SEO
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

/*
|--------------------------------------------------------------------------
| ADMIN AUTH
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])
    ->middleware('guest')->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])
    ->middleware('guest')->name('admin.login.submit');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])
    ->middleware('auth')->name('admin.logout');

/*
|--------------------------------------------------------------------------
| ADMIN AREA (wajib login)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('alat', AdminEquipmentController::class)->except(['show']);
    Route::resource('portofolio', AdminPortfolioController::class)->except(['show']);

    Route::get('profil-usaha', [CompanyProfileController::class, 'edit'])->name('company-profile.edit');
    Route::put('profil-usaha', [CompanyProfileController::class, 'update'])->name('company-profile.update');
});
