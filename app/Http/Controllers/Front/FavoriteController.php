<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class FavoriteController extends Controller
{
    public function favoriteCount(){
        $client = $this->currentClient();
        if (!$client)
            return redirect()->route('front.login.form');

        $count = $client->favoriteCount();

        return response()->json(['success'=> true, 'favorite_count'=> $count]);
    }

    public function addToFavorites(Request $request)
    {
        $client = $this->currentClient();
        if (!$client)
            return redirect()->route('front.login.form');

        $client->favorites()->attach($request->product_id);

        return response()->json(['success'=>true]);
    }

    public function removeFromFavorites(Request $request)
    {
        $client = $this->currentClient();
        if (!$client)
            return redirect()->route('front.login.form');

        $client->favorites()->detach($request->product_id);

        return response()->json(['success'=>true]);
    }

    public function currentClient()
    {
        return auth()->guard('client')->user();
    }
}
