<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array(
            // [
            //     'slug' => 'sarayly-hyzmat',
            //     'order' => 1,
            //     'name' => 'Sarayly Hyzmat',
            //     'description' => 'Мы предлагаем свой опыт и свои знания тем, кто заинтересован в стабильном развитии своего бизнеса, тем, кто ценит надежных партнеров и готов расширять возможности своего бизнеса, благодаря доверительным отношениям со своими партнерами-консультантами.',
            //     'logo' => 'logo2.png',

            // ],
            [
                'slug' => 'ykjam-senagat',
                'order' => 2,
                'name' => 'Ykjam Senagat',
                'description' => 'Ykjam Senagat description.',
                'logo' => 'logo1.png',

            ],
        );

        foreach ($data as $section) {
            $s = Section::firstOrCreate([
                'slug' => $section['slug'],
            ], [
                'name' => [
                    'tm' =>  $section['name'],
                    'en' =>  $section['name'],
                    'ru' =>  $section['name'],
                ],
                'description' => [
                    'tm' =>  $section['description'],
                    'en' =>  $section['description'],
                    'ru' =>  $section['description'],
                ],
                'order' => $section['order'],
            ]);

            $s->addMedia(public_path('seeder/' . $section['logo']))->preservingOriginal()->toMediaCollection('logos');
        }
    }
}
