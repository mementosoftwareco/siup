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
        'name', 'email', 'password', 'state'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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
	
	public function getNombrePerfil()
	{
		
		$rol = Rol::where( 'id_usuario' , '=' , Auth::user()->id )->get()->first();
		$perfil = Perfil::where('id', '=' , $rol->id_perfil)->get()->first();		
		return $perfil -> nombre;
	}
	
}
