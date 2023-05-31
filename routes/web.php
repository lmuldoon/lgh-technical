<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\orderReport;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/charts', [orderReport::class, 'chartData']);
/*Route::get('/charts', function () {
    return view('charts',['chartData' => ChartData]);
});*/

Route::get('test', 'test@build');
