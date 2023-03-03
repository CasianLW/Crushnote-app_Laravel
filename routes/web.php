<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::post('/sendmail', [MessageController::class, 'store'])->name('sendmail');

// Route::get('/sendmail', function () {
//     return view('emails.message-form');
// });


Route::get('/', [App\Http\Controllers\MessageController::class, 'create'])->name('messages.create');
Route::post('/', [App\Http\Controllers\MessageController::class, 'store'])->name('messages.store');
Route::get('/message/{token}', [App\Http\Controllers\MessageController::class, 'show'])->name('messages.show');


// Route::get('/', function () {
//     return view('welcome');
// });
