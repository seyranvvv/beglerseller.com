<?php

namespace Database\Seeders;

use App\Models\BannerType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array(
            [
                'slug' => 'about',
                'name' => [
                    'tm' => 'Biz Barada',
                    'en' => 'About us',
                    'ru' => 'О нас',
                ]
            ],
            [
                'slug' => 'service',
                'name' => [
                    'tm' => 'Hyzmatlarymyz',
                    'en' => 'Our services ',
                    'ru' => 'Наши сервисы',
                ]
            ],
            [
                'slug' => 'post',
                'name' => [
                    'tm' => 'Täzelikler',
                    'en' => 'News',
                    'ru' => 'Новости',
                ]
            ],

            [
                'slug' => 'contact',
                'name' => [
                    'tm' => 'Habarlaşmak',
                    'en' => 'Contact us',
                    'ru' => 'Связаться',
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
    }
}
