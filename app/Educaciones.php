<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Educaciones extends Model
{
    protected $primaryKey = 'id_educacion';
    //
	protected $table = 'educaciones';
	
	protected $dates = ['fecha_graduacion','created_at','updated_at'];
}
