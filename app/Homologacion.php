<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homologacion extends Model
{
    protected $primaryKey = 'id_homologacion';
    //
	protected $table = 'homologaciones';
	
	protected $dates = ['fecha_finalizacion','created_at','updated_at'];
}
