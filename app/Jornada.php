<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProcesoAdmision;
use Carbon\Carbon;

class Jornada extends Model
{
    protected $primaryKey = 'id_jornada';
	
	public $incrementing = false;
	//
	protected $table = 'jornadas';
	
}
