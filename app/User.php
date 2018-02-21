<?php

namespace App;

use App\Task;
use App\Rol;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class User extends Authenticatable
{
	
	protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'state', 'id_perfil', 'id_nodo', 'id_convenio', 'id_facultad'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	
	
	public function perfil()
    {
        return $this->belongsTo('App\Perfil', 'id_perfil', 'id');
    }
	
	
    /**
     * Get all of the tasks for the user.
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
	
	
	public function roles()
	{
		return $this->hasMany(Rol::class);
	}
	
	public function obtenerNombrePerfil()
	{
		
		/*$rol = Rol::where( 'id_usuario' , '=' , Auth::user()->id )->get()->first();
		$perfil = Perfil::where('id', '=' , $rol->id_perfil)->get()->first();		
		return $perfil -> nombre;*/
		
		//$id = Auth::user()->id;
		//$usuario = Usuario::where( 'id_user' , '=' , $id )->get()->first();
		//$rol = Rol::where( 'id_usuario' , '=' , $id )->get()->first();
		//echo $rol->id;
		if(Auth::user()!= null){
			$perfil = Perfil::where('id', '=' , Auth::user()->id_perfil)->get()->first();
			return $perfil -> nombre;			
		} else 
			return null;
	}
	
	
	
	
}
