<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    protected $primaryKey = 'id_facultad';
	
	public $incrementing = false;
	//
	protected $table = 'facultades';
	
}
