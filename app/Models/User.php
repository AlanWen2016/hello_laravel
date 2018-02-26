<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','introduction','avatar'
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
     *  用户和话题一对多的关系
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    /**
     * 判断用户是否为当前用户
     * @param $model
     * @return bool
     */
    public function isAuthorOf($model)
    {
        return $this->id == $model->user_id;
    }
}
