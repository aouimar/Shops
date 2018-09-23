<?php

namespace App\Http\Controllers;

use App\User;
use App\Shop;
use App\FavoriteShop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function refreshFavs(){
        $favs = (new FavoriteShop)->getFavoriteShop();
        return $favs;
    }

    public function removeShop($id)
    {
        $shop_id=$id;
        $user_id=Auth::user()->id;
        
        $firstEntry = FavoriteShop::where('shop_id', $shop_id)
                                  ->where('user_id', $user_id)
                                  ->where('liked', true)
                                  ->first();
          
        $firstEntry->liked = false;                                                     
        $firstEntry->save();
    }

    public function likeShop($id)
    {
        $shop_id=$id;
        $user_id=Auth::user()->id;
        
        $existingEntry = FavoriteShop::where('liked', true)
                                     ->where('shop_id', $shop_id)
                                     ->where('user_id', $user_id)->get();
        
        $firstEntry = FavoriteShop::where('shop_id', $shop_id)
                                  ->where('user_id', $user_id); 
                                  
        if($existingEntry->isEmpty()){                                                      
            if($firstEntry->get()->isEmpty()){
                $fav = new FavoriteShop;
                $fav->shop_id = $shop_id;
                $fav->user_id = $user_id;
                $fav->liked = true;
                $fav->save();
            }
            else{
                $firstEntry->update(['liked' => true, 'disliked' => false]);
            }
        }

        
    }


   public function dislikeShop($id)
    {
        $shop_id=$id;
        $user_id=Auth::user()->id;
        
        $existingEntry = FavoriteShop::where('disliked', true)
                                     ->where('shop_id', $shop_id)
                                     ->where('user_id', $user_id)->get();
        $firstEntry = FavoriteShop::where('shop_id', $shop_id)
                                  ->where('user_id', $user_id);
          
        if($existingEntry->isEmpty()){                                                      
            if($firstEntry->get()->isEmpty()){
                $fav = new FavoriteShop;
                $fav->shop_id = $shop_id;
                $fav->user_id = $user_id;
                $fav->disliked = true;
                $fav->save();
            }
            else{
                $firstEntry->update(['liked' => false, 'disliked' => true]);
            }
        }
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FavoriteShop  $favoriteShop
     * @return \Illuminate\Http\Response
     */
    public function show(FavoriteShop $favoriteShop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FavoriteShop  $favoriteShop
     * @return \Illuminate\Http\Response
     */
    public function edit(FavoriteShop $favoriteShop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FavoriteShop  $favoriteShop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FavoriteShop $favoriteShop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FavoriteShop  $favoriteShop
     * @return \Illuminate\Http\Response
     */
    public function destroy(FavoriteShop $favoriteShop)
    {
        //
    }
}
