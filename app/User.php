<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**Executive::select(\DB::raw(' DATE_FORMAT(created_at,"%d %m %Y" ) ' ) )->.........
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey='id';
    protected $fillable = [
        'email', 'password','name'
    ];

    public $visible= [
        'name','email'
    ];

    public function aprendiz(){
        return $this->belongsTo(Aprendiz::class,'id', 'id_user');
    }
    
    /*
    Este método relaciona la tabla users y empresa
    */
    public function empresa() { 
        return $this->belongsTo(Empresa::class,'id','id');
    }

    public  function sacar($email){
        $data = DB::table('users')->select('email','documento_apre')->join('aprendiz','users.id','=','aprendiz.id_user')->where('users.email',$email)->get();


        return $data;
    }

    //protected $tabla = 'users';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
