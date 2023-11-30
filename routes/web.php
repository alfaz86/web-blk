<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsCrudController;
use App\Http\Controllers\Admin\ProfileCrudController;
use App\Http\Controllers\Admin\RegistrationCrudController;
use App\Http\Controllers\Admin\VideoCrudController;
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

Route::get('/', [DashboardController::class, 'homePage']);
Route::get('/hubungi-kami', function() {
    return view('contact');
})->name('contact.page');

Route::get('/pendaftaran', [RegistrationCrudController::class, 'form'])->name('registration.form');
Route::post('/pendaftaran', [RegistrationCrudController::class, 'store'])->name('registration.store');

Route::group(['prefix' => 'media-informasi'], function () {
    Route::get('/video', [VideoCrudController::class, 'videoPage'])->name('video.page');
    Route::get('/berita', [NewsCrudController::class, 'newsPage'])->name('news.page');
    Route::get('/berita/{slug}', [NewsCrudController::class, 'detailNewsPage'])->name('news.page.detail');
});

Route::group(['prefix' => 'profil'], function () {
    Route::get('/struktur-organisasi', [ProfileCrudController::class, 'organizationStructurePage'])->name('organization.structure.page');
    Route::get('/visi-dan-misi', [ProfileCrudController::class, 'vissionAndMissionPage'])->name('vission_and_mission.page');
});