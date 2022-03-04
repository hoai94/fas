<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'flag',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function isSuperAdmin($ability)
    // {
    //     foreach (\auth()->user()->roles as $role){
    //         foreach ($role->permission as $permission){
    //            return $permission->name == $ability;
    //         }
    //     }
        
    // }
    

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users');
    }
    public function hasAccess()
    {
        // check if the permission is available in any role
        $arrPermission = [];
        foreach ($this->roles as $role) {
            $arrPermission[]  = json_decode($role->permission);
                          
        }
        if($arrPermission) {
            return array_merge(...$arrPermission);
        } 
    }

   
}
