<?php

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;



Route::prefix('/')->name('form.')->group(function(){
    Route::get('/', [FormController::class, 'index'])->name('index');
    Route::post('/', [FormController::class, 'store'])->name('store');
    Route::get('/all-data', [FormController::class, 'allData'])->name('allData');
    Route::get('/{id}/edit-data', [FormController::class, 'editdata'])->name('editdata');
    Route::put('/{id}/update-data', [FormController::class, 'updateData'])->name('updateData');
    Route::delete('/{id}/destroy', [FormController::class, 'destroy'])->name('destroy');
});
