<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections  = Section::all();

        $data = array(
            [
                'title' => 'Professional audit',
                'content' => 'Morbi viverra diam nec tellus semper, consequat hendrerit quam volutpat. Aliquam convallis feugiat orci, in tincidunt nisl iaculis nec. Aenean laoreet, nulla a ornare sollicitudin, sapien justo volutpat quam, a facilisis tortor sem consectetur risus. Nam nec nulla dui. Vivamus ac tortor sit amet ex facilisis tincidunt varius nibh ut nisl euismod.',
                'image' => 'service.jpg',
                'icon' => 'service-icon.png',
            ],
        );


        foreach ($sections as $section) {
            foreach ($data as $service) {
                for ($i = 0; $i < 8; $i++) {
                    $s = $section->services()->create([
                        'title' => [
                            'fr' =>  $service['title'],
                            'en' =>  $service['title'],
                            'ru' =>  $service['title'],
                        ],
                        'content' => [
                            'fr' =>  $service['content'],
                            'en' =>  $service['content'],
                            'ru' =>  $service['content'],
                        ],
                    ]);

                    $s->addMedia(public_path('seeder/' . $service['image']))->preservingOriginal()->toMediaCollection('services');
                    $s->addMedia(public_path('seeder/' . $service['icon']))->preservingOriginal()->toMediaCollection('icon');
                }
            }
        }
    }
}
