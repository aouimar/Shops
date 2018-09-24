<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * 
 */
class Shop extends Model
{
	protected $fillable = [
        'name', 'distance', 'slug'
    ];
    
    function miles(){
    	return $this->distance * 0.000621371 ;
    }

    function isTinyDistance(){
    	return $this->miles() < 1;
    }
	
	public function favoriteShop(){
		return $this->hasMany('\App\FavoriteShop')->where('liked', true);
	}

	public function allShop(){
        return $this->hasMany('\App\FavoriteShop')->whereUser_id(Auth::user()->id);
    }
    
	public function ordinaryShop(){
        return $this->hasMany('\App\FavoriteShop')->whereLiked(false);
    }
}
