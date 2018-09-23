<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;


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

	public function ordinaryShop(){
        return $this->hasMany('\App\FavoriteShop')->whereLiked(false);
    }
}
