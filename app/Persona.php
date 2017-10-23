<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProcesoAdmision;
use Carbon\Carbon;

class Persona extends Model
{
    protected $primaryKey = 'id_persona';
	//
	protected $table = 'personas';
	
	protected $dates = ['fecha_expedicion_doc','fecha_nacimiento','created_at','updated_at'];
	
	public function procesoAdmision()
    {
        return $this->hasMany(ProcesoAdmision::class, 'id_proceso_admon', 'id_proceso_admon');
    }
}
