<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Msg;

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
Route::get('/logger', [Msg::class, 'mensajeria']);
Route::post('/check', [Msg::class, 'verificar']);
Route::post('/envio', [Msg::class, 'guardar_mensaje']);
Route::get('/cerrar', [Msg::class, 'close']);
// Route::get('/', function () {
//     return view('welcome');
// });
