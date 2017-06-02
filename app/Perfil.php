<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
   protected $table = 'perfiles';
   
   
   
   public function roles()
	{
		return $this->hasMany(Rol::class);
	}
}
