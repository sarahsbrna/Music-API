<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MusikExternalController;

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', [MusikExternalController::class, 'topTracks']);
