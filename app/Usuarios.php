<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Usuarios extends Model
{
    //    
    protected $table = 'usuarios';
    protected $primaryKey = 'usu_codigo';
    public $timestamps = false;

    protected $fillable = [
        'usu_codigo','usu_nombre', 'usu_password', 'usu_estado'
    ];

    public static function validarLogin($usuario, $password){
        return DB::table('usuarios')
            ->where('usu_nombre',$usuario)
            ->where('usu_password',$password)
            ->where('usu_estado',1)
            ->select('usu_codigo','usu_nombre')
            ->first();
        //return Usuarios::where('usu_nombre',$usuario)->first();
    }
}
