<?php

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

Route::get('/gastos', 'GastoController@index');

Route::get('/gastos/agregar', 'GastoController@agregar');
Route::post('/gastos/crear', 'GastoController@crear');
Route::post('/gastos/pagar', 'GastoController@pagar');
Route::post('/gastos/borrar', 'GastoController@borrar');

Route::get('mailable', function () {

    $gasto = App\Gasto::whereDate('vencimiento', '=', now()->addDays(2)->setTime(0, 0, 0)->toDateTimeString())->get();
    dd($gasto);
    $gasto = App\Gasto::find(1);

    return new App\Mail\RecordatorioServicio($gasto);
});
