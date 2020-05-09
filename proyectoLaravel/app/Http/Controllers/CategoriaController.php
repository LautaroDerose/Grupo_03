<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{
    public function agregar(Request $request){
    	$errores = [
    		"nombre" => 'required|string|max:60|min:3'
    	];

    	$mensajes = [
    		'required' => "El  :attribute es necesario",
    		'max' => "El  :attribute tiene un maximo de :max caracteres ",
    		'min' => "El  :attribute debe ser como minimo de :min caracteres",
    		'string' => "El :attribute debe ser solo letras"
    	];

    	$this->validate($request,$errores,$mensajes);
    	 
    	$categoria = new Categoria();
    	$categoria->nombre = $request["nombre"];
 
    	$categoria->save();

    	return redirect("/categorias");
    }

    public function listar(){
    	$categorias = Categoria::all();
    	return view('categorias', compact('categorias'));
    }

    public function eliminar(Request $request){
    	$producto = Producto::find($request["id"]);
        $producto->delete();
    	return redirect("/categorias");
    }
}
