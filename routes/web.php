<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\UserController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[UserController::class,'index'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::post('/ticket/store',[QueueController::class,'store'])->name('ticket.store');
Route::post('/queue/serve',[QueueController::class,'serve'])->name('queue.serve');
