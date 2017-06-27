<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
   protected $table = 'perfiles';
   protected $primaryKey = 'id';
   
   protected $fillable = [
        'nombre', 'descripcion'
    ];
   
   
   public function user()
    {
        return $this->hasMany('App\User');
    }
	

}
