<?php

namespace Database\Seeders;

use App\Models\BannerType;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections  = Section::all();


        $data = array(
            [
                'slug' => 'product',
                'name' => [
                    'tm' => 'Harytlar',
                    'en' => 'Products',
                    'ru' => 'Продукты',
                ]
            ],

        );


        foreach ($data as $type) {
            $type = BannerType::create([
                'slug' => $type['slug'],
                'name' => [
                    'tm' => $type['name']['tm'],
                    'ru' => $type['name']['ru'],
                    'en' => $type['name']['en'],

                ]
            ]);
        }

        $bannerType = BannerType::whereSlug('product')->first();

        $data = array(
            [
                'image' => 'banner.jpg'
            ],
        );

        foreach ($sections as $section) {
            foreach ($data as $banner) {
                $b = $section->banners()->create(
                    [
                        'banner_type_id' => $bannerType->id,
                    ]

                );

                $b->addMedia(public_path('seeder/' . $banner['image']))->preservingOriginal()->toMediaCollection('banners');
            }
        }
    }
}
