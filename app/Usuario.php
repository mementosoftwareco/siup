<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Task;
use App\Rol;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class Usuario extends Model
{
	
	protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'email', 'contrasenia', 'estado', 'id_user'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'contrasenia', 'remember_token',
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
	
	public function obtenerNombrePerfil()
	{
		$id = Auth::user()->id;
		$usuario = Usuario::where( 'id_user' , '=' , $id )->get()->first();
		$rol = Rol::where( 'id_usuario' , '=' , $usuario->id )->get()->first();
		$perfil = Perfil::where('id', '=' , $rol->id_perfil)->get()->first();		
		return $perfil -> nombre;
	}
	
}
