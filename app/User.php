<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function favoriteShop(){
        return $this->hasMany('\App\FavoriteShop')->where('liked', true);
    }

    public function allShop(){
        return $this->hasMany('\App\FavoriteShop')->whereUser_id(Auth::user()->id);;
    }
    public function ordinaryShop(){
        return $this->hasMany('\App\FavoriteShop')->whereLiked(false);
    }
}
