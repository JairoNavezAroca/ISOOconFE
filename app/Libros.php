<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Libros extends Model{
    //    
    protected $table = 'libros';
    protected $primaryKey = 'CodLibro';
    public $timestamps = false;

    protected $fillable = [
		'CodLibro','TitLibro','AnoLibro','IdAutor','IdEditorial'
    ];

}
