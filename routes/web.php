<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [TicketController::class, 'index']);
Route::get('/ticket/create', [TicketController::class, 'create']);//->middleware('auth');
Route::post('/ticket/store/{ticket}', [TicketController::class, 'store']);//->middleware('auth');
Route::post('/ticket/store', [TicketController::class, 'store']);//->middleware('auth');
Route::get('/ticket/edit/{ticket}', [TicketController::class, 'edit']);
Route::get('/ticket/{ticket}', [TicketController::class, 'show']);
Route::get('/ticket/delete/{ticket}', [TicketController::class, 'destroy']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
