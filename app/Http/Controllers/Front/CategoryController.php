<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::ordered()->get();

        $banner = Banner::whereHas('section', function ($q) {
            $q->whereId(config('section')->id);
        })
            ->whereHas('type', function ($query) {
                $query->whereSlug('product');
            })
            ->first();

        return view("front.categories.index", compact("categories", "banner"));
    }
}
