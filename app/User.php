<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','status',
    ];

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

    public function Urls()
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }

    public function modelHasRoles()
    {
        return $this->morphMany('App\ModelHasRole', 'modelRole');
    }

    public function setPasswordAttribute($password)
    {   
    $this->attributes['password'] = bcrypt($password);
    }

    public function findForPassport($identifier) {
        return User::orWhere('email', $identifier)->where('status', 'aktif')->first();
    }
}
