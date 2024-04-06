<?php

namespace App\Http\Controllers\Front;

use App\Models\Banner;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Cookie;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cookieEpireMin = 60 * 24 * 7;

    public function index()
    {
        $banner = Banner::whereHas('section', function ($q) {
            $q->whereId(config('section')->id);
        })
            ->whereHas('type', function ($query) {
                $query->whereSlug('product');
            })
            ->first();

        $client = $this->currentClient();
        if ($client) {
            $products = $client->carts;
            $cart_data = [];
            foreach ($products as $product) {
                $cart_data[] = [
                    'item_id' => $product->id,
                    'item_name' => $product->title,
                    'item_quantity' => $product->pivot->quantity,
                    'item_price' => $product->price,
                    'item_image' => $product->pivot->image,
                ];
            }
            return view('front.cart.index', compact('cart_data', 'banner'));
        }
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        return view('front.cart.index', compact('cart_data', 'banner'));
    }

    public function loadData()
    {
        $client = $this->currentClient();
        if ($client) {
            return response()->json(['totalcart' => $client->carts()->count()]);
        }

        if (Cookie::get('shopping_cart')) {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
            $totalcart = 0;
            foreach ($cart_data as $keys => $values) {
                $totalcart += $cart_data[$keys]["item_quantity"];
            }

            return response()->json(['totalcart' => $totalcart]);
        } else {
            $totalcart = "0";
            return response()->json(['totalcart' => $totalcart]);
        }
    }


    public function addToCart(Request $request)
    {
        $prod_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        $client = $this->currentClient();
        if ($client) {
            $products = Product::find($prod_id);
            if ($products) {
                $prod_name = $products->title;
                $prod_image = $products->getfirstMediaUrl('products');
                $priceval = $products->price ? $products->price : 0;

                $client->carts()->attach($prod_id, [
                    "name" => $prod_name,
                    "quantity" => $quantity,
                    "price" => $priceval,
                    "image" => $prod_image,
                ]);
            }

            return response()->json(['status' => '"' . $prod_name . '" Added to Cart']);
        }


        if (Cookie::get('shopping_cart')) {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
        } else {
            $cart_data = array();
        }

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $prod_id;

        if (in_array($prod_id_is_there, $item_id_list)) {
            foreach ($cart_data as $keys => $values) {
                if ($cart_data[$keys]["item_id"] == $prod_id) {
                    $cart_data[$keys]["item_quantity"] = $request->input('quantity');
                    $item_data = json_encode($cart_data);
                    $minutes = $this->cookieEpireMin;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    return response()->json(['status' => '"' . $cart_data[$keys]["item_name"] . '" Already Added to Cart', 'status2' => '2']);
                }
            }
        } else {
            $products = Product::find($prod_id);
            $prod_name = $products->name;
            $prod_image = $products->getfirstMediaUrl('products');
            $priceval = $products->price;

            if ($products) {
                $item_array = array(
                    'item_id' => $prod_id,
                    'item_name' => $prod_name,
                    'item_quantity' => $quantity,
                    'item_price' => $priceval,
                    'item_image' => $prod_image
                );
                $cart_data[] = $item_array;

                $item_data = json_encode($cart_data);
                $minutes = $this->cookieEpireMin;
                Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                return response()->json(['status' => '"' . $prod_name . '" Added to Cart']);
            }
        }
    }

    public function updateToCart(Request $request)
    {
        $prod_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        $client = $this->currentClient();
        if ($client) {
            $products = Product::find($prod_id);
            if ($products) {
                $prod_name = $products->title;
                $prod_image = $products->getfirstMediaUrl('products');
                $priceval = $products->price ? $products->price : 0;

                $client->carts()->attach($prod_id, [
                    "name" => $prod_name,
                    "quantity" => $quantity,
                    "price" => $priceval,
                    "image" => $prod_image,
                ]);
            }

            return response()->json(['status' => '"' . $prod_name . '" Quantity Updated']);
        }


        if (Cookie::get('shopping_cart')) {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);

            $item_id_list = array_column($cart_data, 'item_id');
            $prod_id_is_there = $prod_id;

            if (in_array($prod_id_is_there, $item_id_list)) {
                foreach ($cart_data as $keys => $values) {
                    if ($cart_data[$keys]["item_id"] == $prod_id) {
                        $cart_data[$keys]["item_quantity"] = $quantity;
                        $item_data = json_encode($cart_data);
                        $minutes = $this->cookieEpireMin;
                        Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                        return response()->json(['status' => '"' . $cart_data[$keys]["item_name"] . '" Quantity Updated']);
                    }
                }
            }
        }
    }


    public function deleteFromCart(Request $request)
    {
        $prod_id = $request->input('product_id');

        $client = $this->currentClient();
        if ($client) {
            $client->carts()->detach($prod_id);

            return response()->json(['status' => 'Item Removed from Cart']);
        }


        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $prod_id;

        if (in_array($prod_id_is_there, $item_id_list)) {
            foreach ($cart_data as $keys => $values) {
                if ($cart_data[$keys]["item_id"] == $prod_id) {
                    unset($cart_data[$keys]);
                    $item_data = json_encode($cart_data);
                    $minutes = $this->cookieEpireMin;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    return response()->json(['status' => 'Item Removed from Cart']);
                }
            }
        }
    }

    public function checkout()
    {
        $banner = Banner::whereHas('section', function ($q) {
            $q->whereId(config('section')->id);
        })
            ->whereHas('type', function ($query) {
                $query->whereSlug('product');
            })
            ->first();

        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        return view('front.cart.checkout', compact('cart_data', 'banner'));
    }

    public function order(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'required',
        ]);
        $banner = Banner::whereHas('section', function ($q) {
            $q->whereId(config('section')->id);
        })
            ->whereHas('type', function ($query) {
                $query->whereSlug('product');
            })
            ->first();

        $order = new Order();
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->total_price = 0;
        $order->save();
        $cartPrice = 0;
        if (Cookie::get('shopping_cart')) {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
            $totalcart = 0;
            foreach ($cart_data as $keys => $values) {
                $product_id = $cart_data[$keys]["item_id"];
                $product = Product::find($product_id);
                if (!$product)
                    continue;
                $qty = (float) $cart_data[$keys]["item_quantity"];
                $price = (float) $product->price;
                $total_price = number_format($qty * $price, 2);
                $cartPrice += ($qty * $price);
                $order->products()->attach($product->id, [
                    'qantity' => $qty,
                    'price' => $total_price,
                ]);
            }
            Cookie::queue(Cookie::forget('shopping_cart'));
        }
        $order->total_price = $cartPrice;

        $order->save();
        return redirect()->route('products.index')->with('success', 'Your order is ordered!');
    }

    public function currentClient()
    {
        return auth()->guard('client')->user();
    }
}
