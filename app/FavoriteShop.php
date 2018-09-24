<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Shop;
use App\User;

class FavoriteShop extends Model
{
      protected $fillable = [ 'shop_id', 'user_id', 'liked', 'disliked' ];
      

    public function user(){
      	return $this->belongsTo('\App\User');
    }

    public function shop(){
      	return $this->belongsTo('\App\Shop');
    }
      
    public function getFavoriteShop(){
      	/*select * from Shops where(select * from Shops a, Favorite_Shops b, Users c
            where a.id = b.shop_id and c.id = b.user_id and b.liked = 1);*/
      	$favs = User::find(Auth::user()->id)->FavoriteShop()->get()
                    ->map(function($fav){return $fav->shop()->first();})
                    ->sortBy(function($q){return $q->distance;});           
        return $favs;            
    }

    public function getNearbyShop(){
      	$shopp = Shop::orderBy('distance')->get()->map(function($sh){
      		if($sh->allShop()->get()->filter()->isEmpty()){
      				return $sh;
      		} 
      		else{
      			if($sh->ordinaryShop()->first()){
      		  		$ods = $sh->ordinaryShop()->whereUser_id(Auth::user()->id)
      		  				->first();
      		  		if($ods){			
      		  		$disliked=$ods->disliked;
      		  		$disliked_since=Carbon::parse($ods->updated_at)->diffInHours(Carbon::now());
      				if(!$disliked || ($disliked && $disliked_since >= 2)){			
      		  			return	$ods->shop()->first();
      		  		}}
      		  	}
      		}
      	})
      	->filter();
      	
      	return $shopp;
  	}
}
