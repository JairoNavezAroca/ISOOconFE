<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'codigo';
    public $timestamps = false;

    protected $fillable = ['codigo','dni','apellidos','nombres','direccion','fechanacimiento','usu_estado'
    ];
}
