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
Route::get('/', [Msg::class, 'mensajeria']);
Route::get('/check2', [Msg::class, 'verificar']);
// Route::get('/', function () {
//     return view('welcome');
// });
