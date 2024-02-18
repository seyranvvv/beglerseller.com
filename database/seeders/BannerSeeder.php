<?php

namespace Database\Seeders;

use App\Models\BannerType;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections  = Section::all();

        $bannerTypes = BannerType::all();

        $data = array(
            [
                'image' => 'banner.jpg'
            ],
        );

        foreach ($sections as $section) {
            foreach ($bannerTypes as $type) {
                foreach ($data as $banner) {
                    $b = $section->banners()->create(
                        [
                            'banner_type_id' => $type->id,
                        ]

                    );

                    $b->addMedia(public_path('seeder/' . $banner['image']))->preservingOriginal()->toMediaCollection('banners');
                }
            }
        }
    }
}
