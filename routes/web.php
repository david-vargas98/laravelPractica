<?php

use App\Models\Contacto;
use Illuminate\Http\Request; //Espacio de nombres para Request
use Illuminate\Support\Facades\Route;

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

Route::get('/contacto/{tipo?}', function ($tipo = null) { //Para recibir variables se usa /{}, agregar "?" lo hace opcional (puede o no recibir algo), se agrega null para tener un valor por defecto
    //existe $tipo
    return view('contacto', compact('tipo')); //Otra manera: return view('contacto')->with(['tipo' -> $tipo]);
});

Route::post('/validar-contacto', function(Request $request) { //Técinca "Inyección de métodos" se crea una isntancia de la clase request
    //dd($request->correo); //Método de la instancia, all() recupera todos los valores en un arreglo, y de uno por uno se usa el nombre de las variables
    $contacto = new Contacto(); //Instancia del modelo Contacto que se creó con php artisan
    $contacto->nombrePersona = $request->nombrePersona;
    $contacto->correo = $request->correo;
    $contacto->comentarios = $request->comentarios;
    $contacto->save();
    //Se redirige a la url última petición
    return redirect()->back();
});
