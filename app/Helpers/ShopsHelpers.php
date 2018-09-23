<?php 

namespace App\Helpers;
use App\FavoriteShop;
use Carbon\Carbon;
use App\Shop;

class ShopsHelpers
{
  	public static function format_distance($shop){
		if($shop->isTinyDistance()){
        	return number_format($shop->distance, 2, ',', ' '). ' meters';
		}
		else {
			return number_format($shop->miles(), 2, ',', ' ') .' miles';
		} 
	}

	public static function since($fav){
		return Carbon::parse($fav->ordinaryShop()->first()->updated_at)
						->diffInHours(Carbon::now());
	}
}


?>