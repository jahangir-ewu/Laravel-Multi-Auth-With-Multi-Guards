<?php

use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;


// Route::get('admin/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth:admin', 'verified'])->name('admin.dashboa
// rd');

Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {

    Route::get('dashboard',function(){
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

