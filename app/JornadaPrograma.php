<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProcesoAdmision;
use Carbon\Carbon;

class JornadaPrograma extends Model
{
    protected $primaryKey = 'id_jornada_programa';
	
	public $incrementing = false;
	//
	protected $table = 'jornadas_programas';
	
	public function Jornada()
    {
        return $this->belongsTo(Jornada::class, 'id_jornada', 'id_jornada');
    }
	
}
