<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array(
            [
                'title' => 'Lorem ipsum <br> dolor sit amet',
                'body' => 'Lorem ipsum dolor sit amet,<br> consectetur adipiscing elit, <br>sed do eiusmod tempor incididunt ut labore et dolore magna <br>aliqua. Ut enim ad minim veniam',
                'url' => 'lorem/ipsum',
                'status' => true,
                'image' => 'slider.jpg',
            ]
        );

        $sections  = Section::all();
        foreach ($sections as $section) {

            foreach ($data as $slider) {
                $s =  $section->sliders()->create([
                    'title' => [
                        'tm' =>  $slider['title'],
                        'en' =>  $slider['title'],
                        'ru' =>  $slider['title'],
                    ],
                    'body' => [
                        'tm' =>  $slider['body'],
                        'en' =>  $slider['body'],
                        'ru' =>  $slider['body'],
                    ],
                    'url' =>  $slider['url'],
                    'status' =>  $slider['status'],


                ]);
                $s->addMedia(public_path('seeder/' . $slider['image']))->preservingOriginal()->toMediaCollection('slider_tm');
                $s->addMedia(public_path('seeder/' . $slider['image']))->preservingOriginal()->toMediaCollection('slider_en');
                $s->addMedia(public_path('seeder/' . $slider['image']))->preservingOriginal()->toMediaCollection('slider_ru');
            }
        }
    }
}
