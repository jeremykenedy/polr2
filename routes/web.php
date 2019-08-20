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

// App Setup Routes
Route::get('/setup', ['uses' => 'SetupController@index'])->name('setup');
Route::post('/setup', ['uses' => 'SetupController@performSetup'])->name('performSetup');
Route::get('/setup/finish', ['uses' => 'SetupController@finishSetup'])->name('finishSetup');

// GET endpoints
Route::get('/', ['uses' => 'IndexController@index'])->name('home');
