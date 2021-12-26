<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CongesController;
use App\Http\Controllers\EmployeController;

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

/*** Conges Routes  ***/
Route::get('/conges/{userid}', 'CongesController@index')->name('conges');
Route::post('/conges/ajouter', 'CongesController@ajouterConge')->name('ajouter_conge');
Route::get('/employes/conges/{userid}/{id}', 'CongesController@congesEmploye')->name('employes_conges');
Route::get('/employes/conges/{id}/{action}', 'CongesController@actionConges')->name('employes_conges_action');



/*** Employe Routes ***/
Route::get('/employe/{id}', 'EmployeController@index')->name('employe');
