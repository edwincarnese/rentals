<?php

use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Lister\PropertyController as ListerPropertyController;
use App\Http\Controllers\Lister\ProfileController as ListerProfileController;
use App\Http\Controllers\Lister\BookingController as ListerBookingController;
use App\Http\Controllers\TransactionsController;
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
Route::get('/', [PageController::class, 'home']);

Route::get('home', [PageController::class, 'home'])->name('pages.home');
Route::get('about', [PageController::class, 'about'])->name('pages.about');
Route::get('contact', [PageController::class, 'contact'])->name('pages.contact');
Route::get('contact/send', [PageController::class, 'index'])->name('pages.index');

Route::get('properties', [PropertyController::class, 'index'])->name('pages.properties.index');
Route::get('properties/{id}', [PropertyController::class, 'show'])->name('pages.properties.show');

Route::get('owners', [OwnerController::class, 'index'])->name('pages.owners.index');
Route::get('owners/{id}', [OwnerController::class, 'show'])->name('pages.owners.show');

Route::group(['middleware' => ['auth']], function() {
    Route::post('lister/profile', [ListerProfileController::class, 'updateProfile'])->name('lister.profile.update');
    Route::get('lister/profile', [ListerProfileController::class, 'index'])->name('lister.profile');
    Route::post('lister/change-password', [ListerProfileController::class, 'updatePassword'])->name('lister.update.password');
    Route::get('lister/change-password', [ListerProfileController::class, 'changePassword'])->name('lister.change.password');
        
    Route::get('lister/bookings', [ListerBookingController::class, 'index'])->name('lister.bookings');

    Route::post('lister/properties', [ListerPropertyController::class, 'store'])->name('lister.properties.store');
    Route::get('lister/properties', [ListerPropertyController::class, 'index'])->name('lister.properties.index');
    Route::get('lister/properties/create', [ListerPropertyController::class, 'create'])->name('lister.properties.create');
    Route::get('lister/properties/{id}/edit', [ListerPropertyController::class, 'edit'])->name('lister.properties.edit');
    Route::put('lister/properties/{id}', [ListerPropertyController::class, 'update'])->name('lister.properties.update');
    
    Route::delete('lister/properties/{id}', [ListerPropertyController::class, 'destroy'])->name('lister.properties.destroy');
    
    Route::get('booking/{id}', [PropertyController::class, 'stored'])->name('pages.lister.show');
    // Route::GET('booking/{id}', [PropertyController::class, 'stored'])->name('pages.lister.show');
    Route::delete('lister/booking/{id}', [ListerBookingController::class, 'destroy']);

    Route::get('admin', [AdminController::class, 'index'])->name('pages.admin.index');
    Route::get('admin/approval/profile/{id}', [AdminController::class, 'show'])->name('admin.lister.approval');
    Route::get('admin/approval', [AdminController::class, 'list'])->name('admin.approval.list');
    Route::put('admin/approval/{id}', [AdminController::class, 'update'])->name('admin.approve');
    // Route::get('admin/message/', [AdminController::class, 'display'])->name('admin.message.list');
   
    Route::get('client/bookings', [ClientController::class, 'index'])->name('client.bookings');
    Route::get('client/properties', [ClientController::class, 'show'])->name('client.show');
    Route::get('client/properties/{id}', [ClientController::class, 'display'])->name('client.display');
    Route::post('client/properties', [ClientController::class, 'store'])->name('client.store');
    Route::delete('client/bookings/{id}', [ClientController::class, 'destroy']);
   
    Route::get('messages/{id}', [MessageController::class, 'stored'])->name('pages.feedback.store');

    Route::get('lister/transaction', [TransactionsController::class, 'show'])->name('lister.transaction');
    Route::get('lister/approve/{id}', [TransactionsController::class, 'index'])->name('lister.approve');
    Route::delete('lister/bokdelete/{id}', [TransactionsController::class, 'destroy'])->name('booking.lister.destroy');
   
});

Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
