<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections  = Section::all();

        $data = array([
            'address' => 'address',
            'slogan' => 'slogan',
            'phone' => '+99362345678',
            'email' => 'contact@company.com',
        ]);


        foreach ($sections as $section) {

            foreach ($data as $contact) {
                Contact::create([
                    'address' => [
                        'fr' =>  $contact['address'],
                        'en' =>  $contact['address'],
                        'ru' =>  $contact['address'],
                    ],
                    'slogan' => [
                        'fr' =>  $contact['slogan'],
                        'en' =>  $contact['slogan'],
                        'ru' =>  $contact['slogan'],
                    ],
                    'phone' => $contact['phone'],
                    'phone1' => $contact['phone'],
                    'email' => $contact['email'],
                    'section_id' => $section->id,
                ]);
            }
        }
    }
}
