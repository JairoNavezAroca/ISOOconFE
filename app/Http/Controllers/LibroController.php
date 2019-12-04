<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Http\Controllers\Redirect;
use App\Libros;
use App\Autor;
use App\Editorial;

use Illuminate\Support\Facades\Validator;
class LibroController extends Controller
{
    public function ver()
	{
		return view('libros.mantenedor');
	}
	public function listar()
	{
		return view('libros.listar', ['libros' => Libros::all()]);
	}
	public function nuevo()
	{
		return view('libros.nuevo', ['autor' => Autor::all(), 'editorial' => Editorial::all()]);
	}
	public function registrar(Request $request)
	{
        $validator = Validator::make($request->all(), [
			'DNI' => 'required|min:4',
			'Apellidos' => 'required|min:4',
			'Nombres' => 'required|min:4',
			'Direccion' => 'required|min:4',
			'Fecha' => 'required'
        ]);
        if ($validator->fails()) {
        	return 'El sabado go barrio! 8-)';
            return redirect('product/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        /*
			$DNI = $request->get('DNI');
			$Apellidos = $request->get('Apellidos');
			$Nombres = $request->get('Nombres');
			$Direccion = $request->get('Direccion');
			$Fecha = $request->get('Fecha');
			if(strlen($DNI) < 4)
				return "campo DNI muy corto";
			if(strlen($Apellidos) < 4)
				return "campo Apellidos muy corto";
			if(strlen($Nombres) < 4)
				return "campo Nombres muy corto";
			if(strlen($Direccion) < 4)
				return "campo Direccion muy corto";
			if(strlen($Fecha) == null)
				return "campo Fecha no ingresado";*/
		Cliente::create([
			'dni' => $DNI,
			'apellidos' => $Apellidos,
			'nombres' => $Nombres,
			'direccion' => $Direccion,
			'fechanacimiento' => $Fecha,
			'usu_estado' => true
		]);
		return "Los datos se han registrado correctamente";
	}
	public function edita(Request $request)
	{
		return view('libros.edita',['cliente' => Cliente::find($request->get('cod'))]);
	}
	public function editar(Request $request)
	{
		$cod = $request->get('cod');
		$DNI = $request->get('DNI');
		$Apellidos = $request->get('Apellidos');
		$Nombres = $request->get('Nombres');
		$Direccion = $request->get('Direccion');
		$Fecha = $request->get('Fecha');
		$c = Cliente::find($cod);
		$c->dni = $DNI;
		$c->apellidos = $Apellidos;
		$c->nombres = $Nombres;
		$c->direccion = $Direccion;
		$c->fechanacimiento = $Fecha;
		$c->save();
		return "Los datos se han modificado correctamente";
	}
	public function cambia_estado(Request $request)
	{
		$cod = $request->get('cod');
		$c = Cliente::find($cod);
		if ($c->usu_estado)
			$c->usu_estado = false;
		else
			$c->usu_estado = true;
		$c->save();
		if ($c->usu_estado)
			return "El usuario se ha habilitado correctamente";
		else
			return "El usuario se ha deshabilitado correctamente";
	}





	public function store(Request $request)
	{
		if($request->ajax())
		{/*
            $usuario = Usuarios::validarLogin($request['usuario'], $request['password']);
			if($usuario != null){
				session(['EJ_SUser' => $usuario->usu_codigo.'-'.$usuario->usu_nombre]);
				return response()->json(['rpta' => 'OK']);
			}
			else
				return response()->json(['rpta' => 'ERROR']);
				*/
		}
		else{
			 return Redirect::back();
		}
    }
    
    
}