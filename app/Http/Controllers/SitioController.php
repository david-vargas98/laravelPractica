<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto; //Se agrega la ruta a la clase

class SitioController extends Controller
{
    public function contactoForm($tipo = null) //Para recibir variables se usa /{}, agregar "?" lo hace opcional (puede o no recibir algo), se agrega null para tener un valor por defecto
    //existe $tipo
    {
        return view('contacto', compact('tipo')); //Otra manera: return view('contacto')->with(['tipo' -> $tipo]);
    }
    
    public function contactoSave(Request $request) //Técinca "Inyección de métodos" se crea una isntancia de la clase request
    {
        //Reglas de validación de las peticiones
        $request -> validate([
        'nombrePersona' => ['required'],
        'correo' => ['required', 'email'],
        'comentarios' => ['required', 'min:5']
    ]);
    
    //dd($request->correo); //Método de la instancia, all() recupera todos los valores en un arreglo, y de uno por uno se usa el nombre de las variables
    $contacto = new Contacto(); //Instancia del modelo Contacto que se creó con php artisan
    $contacto->nombrePersona = $request->nombrePersona;
    $contacto->correo = $request->correo;
    $contacto->comentarios = $request->comentarios;
    $contacto->save();
    //Se redirige a la url última petición
    return redirect()->back();
    }

}