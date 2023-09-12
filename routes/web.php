<?php

//use App\Models\Contacto; Ya no se necesita 
use Illuminate\Http\Request; //Espacio de nombres para Request
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SitioController;

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

Route::get('/contacto/{tipo?}', [SitioController::class, 'contactoForm']);

Route::post('/validar-contacto', [SitioController::class, 'contactoSave']);

Route: