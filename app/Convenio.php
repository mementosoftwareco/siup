<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    protected $primaryKey = 'id_convenio';
	//
	protected $table = 'convenios_banner';
	
	public $incrementing = false;
	
	protected $dates = ['fecha'];
}
