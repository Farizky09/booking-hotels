<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DataController::class, 'Dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/kamar', [DataController::class, 'indexMasterKamar'])->name('kamar.index');
    Route::get('/kamar/add', [DataController::class, 'addMasterKamar'])->name('kamar.add');
    Route::post('/kamar/store', [DataController::class, 'storeMasterKamar'])->name('kamar.store');
    Route::get('/kamar/edit/{id_kamar}', [DataController::class, 'editMasterKamar'])->name('kamar.edit');
    Route::put('/kamar/update/{id_kamar}', [DataController::class, 'updateMasterKamar'])->name('kamar.update');
    Route::get('/kamar/delete/{id_kamar}', [DataController::class, 'deleteMasterKamar'])->name('kamar.destroy');
    
    Route::get('/booking', [TransaksiController::class, 'indexBooking'])->name('booking.index');
    Route::get('/booking/add', [TransaksiController::class, 'addBooking'])->name('booking.add');
    Route::post('/booking/store', [TransaksiController::class, 'storeBooking'])->name('booking.store');
    Route::post('/booking/cancel/{id_booking}', [TransaksiController::class, 'cancelBooking'])->name('booking.cancel');
    Route::post('/booking/done/{id_booking}', [TransaksiController::class, 'doneBooking'])->name('booking.done');
});

require __DIR__ . '/auth.php';
