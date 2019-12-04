<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Editorial extends Model
{
    //    
    protected $table = 'editorial';
    protected $primaryKey = 'IdEditorial';
    public $timestamps = false;

    protected $fillable = [
        'IdEditorial','DesEditorial'
    ];

}
