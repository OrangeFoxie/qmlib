<?php

use Illuminate\Support\Facades\Route;

$controllerLink = 'App\Http\Controllers';
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('testDB', $controllerLink.'\TestDB@index');

Route::get('/', $controllerLink.'\datasheetController@showDocs');       //index page
Route::get('/home', $controllerLink.'\datasheetController@showDocs');   //index page

Auth::routes();

Route::get('/logout', $controllerLink.'\Auth\LoginController@logout');  //log out