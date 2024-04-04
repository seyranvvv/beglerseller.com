<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrontProductRequest;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FrontProductRequest $request)
    {
        $category_id = null;
        $data = $request->validated();
        if ($data) {
            $category_id = $data['category'];
        }
        $category = Category::find($category_id);
        $banner = Banner::whereHas('section', function ($q) {
            $q->whereId(config('section')->id);
        })
            ->whereHas('type', function ($query) {
                $query->whereSlug('product');
            })
            ->first();

        $products = Product::whereHas('section', function ($q) {
            $q->whereId(config('section')->id);
        })
            ->when($category_id, function ($que) use ($category_id) {
                $que->where('category_id', $category_id);
            })
            ->paginate(12);

        $categories = Category::ordered()
            ->when($category_id, function ($q) use ($category) {
                $q->where('parent_category_id', $category->parent_category_id);
            })
            ->get();



        return view('front.products.index', compact('banner', 'products', 'categories'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $banner = Banner::whereHas('section', function ($q) {
            $q->whereId(config('section')->id);
        })
            ->whereHas('type', function ($query) {
                $query->whereSlug('product');
            })
            ->first();

        $cartQty = 0;

        if (Cookie::get('shopping_cart')) {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);

            $item_id_list = array_column($cart_data, 'item_id');
            $prod_id_is_there = $product->id;

            if (in_array($prod_id_is_there, $item_id_list)) {
                foreach ($cart_data as $keys => $values) {
                    if ($cart_data[$keys]["item_id"] == $prod_id_is_there) {
                        $cartQty = $cart_data[$keys]["item_quantity"];
                        break;
                    }
                }
            }
        }

        return view('front.products.show', compact('product', 'banner', 'cartQty'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
