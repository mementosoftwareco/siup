<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
   protected $table = 'roles';
   protected $primaryKey = 'id_rol';
   
   
   
   public function user()
	{
		return $this->belongsTo(User::class);
	}
	
	public function perfil()
	{
		return $this->belongsTo(Perfil::class);
	}
}
