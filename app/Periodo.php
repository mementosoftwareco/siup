<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProcesoAdmision;
use Carbon\Carbon;

class Periodo extends Model
{
    protected $primaryKey = 'id_periodo';
	
	public $incrementing = false;
	//
	protected $table = 'periodos';
	
	protected $dates = ['fecha_inicial_inscripcion','fecha_final_inscripcion','fecha_inicial_hom','fecha_final_hom'];
	
}
