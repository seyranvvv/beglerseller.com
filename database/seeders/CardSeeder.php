<?php

namespace Database\Seeders;

use App\Models\CardType;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections  = Section::all();


        $indexIconCard = CardType::whereSlug('index_icon')->first();
        if ($indexIconCard) {
            $data = array(
                [
                    'name' => 'Fast & Reliable',
                    'body' => 'Lorem ipsum dolor amet consectetur adipiscing elit do eiusmod tempor incid idunt ut labore.',
                    'icon' => 'home.png',
                ]
            );
            foreach ($sections as $section) {
                foreach ($data as $card) {
                    for ($i = 0; $i < 3; $i++) {
                        $c = $section->cards()->create([
                            'name' => [
                                'tm' =>  $card['name'],
                                'en' =>  $card['name'],
                                'ru' =>  $card['name'],
                            ],
                            'body' => [
                                'tm' =>  $card['body'],
                                'en' =>  $card['body'],
                                'ru' =>  $card['body'],
                            ],
                            'card_type_id' => $indexIconCard->id,
                        ]);
                        $c->addMedia(public_path('seeder/' . $card['icon']))->preservingOriginal()->toMediaCollection('icon');
                    }
                }
            }
        }




        $counterCard = CardType::whereSlug('counter')->first();
        if ($indexIconCard) {
            $data = array(
                [
                    'name' => 'Fast & Reliable',
                    'body' => 'Professional team',
                    'icon' => 'data-analytics.png',
                    'counter_number' => 89,
                    'counter_text' => 'k',
                ]
            );
            foreach ($sections as $section) {
                foreach ($data as $card) {
                    for ($i = 0; $i < 4; $i++) {
                        $c = $section->cards()->create([
                            'name' => [
                                'tm' =>  $card['name'],
                                'en' =>  $card['name'],
                                'ru' =>  $card['name'],
                            ],
                            'body' => [
                                'tm' =>  $card['body'],
                                'en' =>  $card['body'],
                                'ru' =>  $card['body'],
                            ],
                            'card_type_id' => $counterCard->id,
                            'counter_number' =>  $card['counter_number'],
                            'counter_text' => [
                                'tm' =>  $card['counter_text'],
                                'en' =>  $card['counter_text'],
                                'ru' =>  $card['counter_text'],
                            ],
                        ]);
                        $c->addMedia(public_path('seeder/' . $card['icon']))->preservingOriginal()->toMediaCollection('icon');
                    }
                }
            }
        }
    }
}
