<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Hash;

/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
*/
class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $fillable = ['name', 'email', 'password', 'remember_token','persona_id','estado'];

    protected $append = ['roles_label','estado_label','roles_type'];    

    protected $connection = 'mysql';
    
    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }
    
    
    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }
    public function evaluarole($arrayRoles)
    {

        return ($this->roles()->whereIn('role_id',$this->roles()->whereIn('name',$arrayRoles)->pluck('id')->toArray())->count());

    }
   /* public function evaluarole($arrayRoles){

        return ($this->roles()->whereIn('role_id',Role::whereIn('name',$arrayRoles)->pluck('id')->toArray())->count());
    }
    */

    public function getRolesLabelAttribute(){

        $label='';
        foreach ($this->roles()->pluck('name') as $role){
            $label.='<span class="label label-info label-many">'.$role.'</span> ';
        }

        return $label;
    }

    public function getRolesTypeAttribute(){

        $roleTypeArray=[];
        foreach ($this->roles as $role){
            $roleType[]=$role->abv.'-'.$role->id;
        }

        return $roleType;
    }

    public function getEstadoLabelAttribute(){

        $label='<span class="label label-default label-many">Sin definir</span> ';

        if($this->estado=='A'){
            $label='<span class="label label-success label-many">Activo</span> ';
        }elseif($this->estado=='I'){
            $label='<span class="label label-danger label-many">Bloqueado</span> ';
        }

        return $label;
    }

    public function steachers()
    {
        return $this->belongsToMany('App\User::class', 'students_steachers', 'user_est_id', 'user_doc_id');
    }

    public function students()
    {
        return $this->belongsToMany('App\User::class', 'students_steachers', 'id', 'user_est_id');
    }
    
}
