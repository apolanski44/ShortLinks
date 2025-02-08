<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortLinkController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/getLinks',[ShortLinkController::class,'showLinks']);
Route::get('/{shortCode}', [ShortLinkController::class,'redirectToOriginal']);
Route::post('/shorten', [ShortLinkController::class, 'createShortLink']);