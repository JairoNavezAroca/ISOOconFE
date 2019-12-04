<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Libros extends Model{
    //    
    protected $table = 'editorial';
    protected $primaryKey = 'IdEditorial';
    public $timestamps = false;

    protected $fillable = [
		'CodLibro','TitLibro','AnoLibro','IdAutor','IdEditorial'
    ];

}
