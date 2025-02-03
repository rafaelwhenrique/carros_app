
<?php

use App\Http\Controllers\CarroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('carros', CarroController::class);