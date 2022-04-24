<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsCRUDController;
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
//.. other code


use App\Http\Controllers\ReadXmlController;

Route::resource('contacts', ContactsCRUDController::class);

Route::match(["get", "post"], "read-xml", [ReadXmlController::class, "index"])->name('xml-upload');


