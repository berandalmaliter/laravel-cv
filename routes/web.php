<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return redirect()->route('profiles.index');
});

Route::resource('profiles', ProfileController::class);

// Export PDF & Word
Route::get('profiles/{profile}/export-pdf', [ProfileController::class, 'exportPdf'])->name('profiles.export.pdf');
Route::get('profiles/{profile}/export-word', [ProfileController::class, 'exportWord'])->name('profiles.export.word');
