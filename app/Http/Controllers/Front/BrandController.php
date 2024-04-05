<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::orderBy('id')->get();

        $banner = Banner::whereHas('section', function ($q) {
            $q->whereId(config('section')->id);
        })
            ->whereHas('type', function ($query) {
                $query->whereSlug('product');
            })
            ->first();

        return view("front.brands.index", compact("brands", "banner"));
    }
}
