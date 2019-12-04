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
		$CodLibro = $request->get('CodLibro');
		$TitLibro = $request->get('TitLibro');
		$AnoLibro = $request->get('AnoLibro');
		$IdAutor = $request->get('IdAutor');
		$IdEditorial = $request->get('IdEditorial');
		Libros::create([
			'CodLibro' => $CodLibro,
			'TitLibro' => $TitLibro,
			'AnoLibro' => $AnoLibro,
			'IdAutor' => $IdAutor,
			'IdEditorial' => $IdEditorial
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