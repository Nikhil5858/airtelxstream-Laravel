<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', HomeController::class);

Route::middleware(['auth', 'role:user'])->group(function () {

});

require __DIR__.'/admin.php';
