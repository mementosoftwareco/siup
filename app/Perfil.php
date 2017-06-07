<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
   protected $table = 'perfiles';
   protected $primaryKey = 'id';
   
   
   
   public function roles()
	{
		return $this->hasMany(Rol::class);
	}
}
