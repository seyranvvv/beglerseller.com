<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array(
            [
                'name' => 'Category 1',
            ],
            [
                'name' => 'Category 2',
            ],
            [
                'name' => 'Category 3',
            ],
            [
                'name' => 'Category 4',
            ],
        );


        foreach ($data as $category) {
            Category::create([
                'name' => [
                    'tm' => $category['name'],
                    'en' => $category['name'],
                    'ru' => $category['name'],
                ]
            ]);
        }
    }
}
