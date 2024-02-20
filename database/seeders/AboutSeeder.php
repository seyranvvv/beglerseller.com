<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections  = Section::all();

        $data = array(
            [
                'title' => 'We provide the best audit policy',
                'content' => '<p class="about-one__text-1">Duis aute irure dolor in reprehenderit in velit esse cillum dolore eu nulla pariatur.</p>
                                <ul class="list-unstyled about-one__points">
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="text">
                                        <p>Refresing to get such a personal touch.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="text">
                                        <p>Duis aute irure dolor in reprehenderit in voluptate.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="text">
                                        <p>Velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                    </div>
                                </li>
                            </ul><p class="about-one__text-2">Nullam eu nibh vitae est tempor molestie id sed ex. Quisque
                            dignissim maximus ipsum, sed rutrum metus tincidunt et. Sed eget tincidunt ipsum.</p>',

                'years_text' => 'Years of experience',
                'years_number' => '30',
                'image_1' => 'about1.jpg',
                'image_2' => 'about2.webp',

            ]
        );


        foreach ($sections as $section) {
            foreach ($data as $about) {
                $a = $section->abouts()->create([
                    'title' => [
                        'fr' =>  $about['title'],
                        'en' =>  $about['title'],
                        'ru' =>  $about['title'],
                    ],
                    'content' => [
                        'fr' =>  $about['content'],
                        'en' =>  $about['content'],
                        'ru' =>  $about['content'],
                    ],
                    'years_number' => $about['years_number'],
                    'years_text' => [
                        'fr' =>  $about['years_text'],
                        'en' =>  $about['years_text'],
                        'ru' =>  $about['years_text'],
                    ],
                ]);

                $a->addMedia(public_path('seeder/' . $about['image_2']))->preservingOriginal()->toMediaCollection('about');
                $a->addMedia(public_path('seeder/' . $about['image_1']))->preservingOriginal()->toMediaCollection('about2');
            }
        }
    }
}
