<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProcesoAdmision;
use Carbon\Carbon;

class PeriodoPrograma extends Model
{
    protected $primaryKey = 'id_periodo_programa';
	
	public $incrementing = false;
	//
	protected $table = 'periodos_programas';
	
	public function Periodo()
    {
        return $this->belongsTo(Periodo::class, 'id_periodo', 'id_periodo');
    }
	
}
