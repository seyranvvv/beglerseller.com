<?php

namespace Database\Seeders;

use App\Models\CardType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CardTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array(
            [
                'slug' =>   'index_icon',
                'name' => [
                    'tm' => 'Baş sahypa ýokardaky',
                    'ru' => 'Главная страница вверху',
                    'en' => 'Home page above',
                ]
            ],
            [
                'slug' =>   'counter',
                'name' => [
                    'tm' => 'Counter (sanayjy)',
                    'ru' => 'Счетчик',
                    'en' => 'Counter',
                ]
            ],
        );


        foreach ($data as $cardType) {
            CardType::create($cardType);
        }
    }
}
