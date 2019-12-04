<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Autor extends Model
{
    //    
    protected $table = 'autor';
    protected $primaryKey = 'IdAutor';
    public $timestamps = false;

    protected $fillable = [
        'IdAutor','ApeAutor', 'NomAutor'
    ];

}
