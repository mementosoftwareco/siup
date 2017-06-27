<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProcesoAdmision;

class Persona extends Model
{
    protected $primaryKey = 'id_persona';
	//
	protected $table = 'personas';
	
	public function procesoAdmision()
    {
        return $this->hasMany(ProcesoAdmision::class, 'id_proceso_admon', 'id_proceso_admon');
    }
}
