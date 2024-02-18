<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Card;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Post;
use App\Models\Service;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {

        
        $sliders = Slider::whereHas('section', function ($q) {
            $q->whereSlug(config('section')->slug);
        })->get();

        $icons = Card::wherehas('section', function ($q) {
            $q->whereId(config('section')->id);
        })
            ->whereHas('type', function ($que) {
                $que->whereSlug('index_icon');
            })
            ->take(3)
            ->get();

        $counters = Card::wherehas('section', function ($q) {
            $q->whereId(config('section')->id);
        })
            ->whereHas('type', function ($que) {
                $que->whereSlug('counter');
            })
            ->take(4)
            ->get();

        $about = About::whereHas('section', function ($q) {
            $q->whereSlug(config('section')->slug);
        })->first();

        $contact = Contact::whereHas('section', function ($q) {
            $q->whereSlug(config('section')->slug);
        })->first();

        $services = Service::whereHas('section', function ($q) {
            $q->whereSlug(config('section')->slug);
        })
            ->ordered()
            ->get();

        $posts = Post::orderBy('datetime', 'desc')
            ->whereHas('section', function ($q) {
                $q->whereId(config('section')->id);
            })
            ->where('datetime', '<=', Carbon::now())
            ->take(3)
            ->get();

            $categories = Category::ordered()->get();

        return view(
            'front.index',
            compact(
                'sliders',
                'icons',
                'about',
                'counters',
                'services',
                'contact',
                'posts',
                'categories',
            )
        );
    }
}
