<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\Product;


class FavoriteController extends Controller
{
    public function index()
    {
        $client = $this->currentClient();
        if (!$client)
            return redirect()->route('front.login.form');

        $banner = Banner::whereHas('section', function ($q) {
            $q->whereId(config('section')->id);
        })
            ->whereHas('type', function ($query) {
                $query->whereSlug('product');
            })
            ->first();

        $products = $client->favorites()->paginate(15);

        return view('front.favorites.index', compact('products', 'banner'));
    }

    public function favoriteCount()
    {
        $client = $this->currentClient();
        $count = 0;
        if ($client)
            $count = $client->favoriteCount();


        return response()->json(['success' => true, 'favorite_count' => $count]);
    }

    public function addToFavorites(Request $request)
    {
        $client = $this->currentClient();
        if (!$client)
            return redirect()->route('front.login.form');

        $client->favorites()->attach($request->product_id);

        return response()->json(['success' => true]);
    }

    public function removeFromFavorites(Request $request)
    {
        $client = $this->currentClient();
        if (!$client)
            return redirect()->route('front.login.form');

        $client->favorites()->detach($request->product_id);

        return response()->json(['success' => true]);
    }

    public function currentClient()
    {
        return auth()->guard('client')->user();
    }
}
