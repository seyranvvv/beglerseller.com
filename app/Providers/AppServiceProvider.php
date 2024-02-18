<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Contact;
use App\Models\ParentCategory;
use App\Models\Section;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {



        view()->composer('front.layouts.app', function ($view) {
            $contact = Contact::whereHas('section', function ($q) {
                $q->whereSlug(config('section')->slug);
            })->first();
            $view->with(compact('contact'));
        });

        view()->composer('front.app.header.menu.left', function ($view) {
            $parentCategories = ParentCategory::has('categories')->ordered()->get();
            $view->with(
                compact('parentCategories'),
            );
        });

        view()->composer('front.sections.brands', function ($view) {
            $brands = Brand::all();
            $view->with(
                compact('brands'),
            );
        });


        // view()->composer('admin.partials.sidebar', function ($view) {
        //     $otherSection = Section::where('id', '!=', config('section')->id)->first();
        //     $view->with(
        //         compact('otherSection'),
        //     );
        // });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFour();
    }
}
