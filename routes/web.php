<?php

use Illuminate\Support\Facades\Route;

require __DIR__.'/web/auth.php';
require __DIR__.'/web/general.php';

Route::get('/', function () {
    return redirect()->route('login');
});