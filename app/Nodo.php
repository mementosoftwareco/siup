<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Nodo extends Model
{
    protected $primaryKey = 'id_nodo';
	
	public $incrementing = false;
	//
	protected $table = 'nodos';
	
	
}
