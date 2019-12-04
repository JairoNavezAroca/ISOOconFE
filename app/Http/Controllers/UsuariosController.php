<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Http\Controllers\Redirect;
use App\Usuarios;
class UsuariosController extends Controller
{
    public function index()
	{		
		return view('index');
	}
	public function store(Request $request)
	{
		if($request->ajax())
		{
            $usuario = Usuarios::validarLogin($request['usuario'], $request['password']);
			if($usuario != null){
				session(['EJ_SUser' => $usuario->usu_codigo.'-'.$usuario->usu_nombre]);
				return response()->json(['rpta' => 'OK']);
			}
			else
				return response()->json(['rpta' => 'ERROR']);
		}
		else{
			 return Redirect::back();
		}
    }
    
    
}