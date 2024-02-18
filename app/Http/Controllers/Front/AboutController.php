<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Banner;
use App\Models\Card;
use App\Models\Contact;
use App\Models\Slider;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $banner = Banner::whereHas('section', function ($q) {
            $q->whereId(config('section')->id);
        })
            ->whereHas('type', function ($query) {
                $query->whereSlug('about');
            })
            ->first();


        $about = About::whereHas('section', function ($q) {
            $q->whereSlug(config('section')->slug);
        })->first();

        $contact = Contact::whereHas('section', function ($q) {
            $q->whereSlug(config('section')->slug);
        })->first();

        $counters = Card::wherehas('section', function ($q) {
            $q->whereId(config('section')->id);
        })
            ->whereHas('type', function ($que) {
                $que->whereSlug('counter');
            })
            ->take(4)
            ->get();


        return view('front.about.index', compact('banner', 'about', 'contact', 'counters', 'counters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
