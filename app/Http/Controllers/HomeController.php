<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Shop;
use App\User;
use App\FavoriteShop;


class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function shops()
    {
        $shops = Shop::orderBy('distance')->get();
        
        $favs = new FavoriteShop;

        return view('pages.shops')->withShops($favs->getOrdinaryShop())->withFavs($favs->getFavoriteShop());
    }
}
