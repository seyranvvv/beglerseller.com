<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
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
                'image' => 'product.jpg',

            ],
        );

        $categories = Category::all();

        foreach ($sections as $section) {
            foreach ($categories as $category) {
                foreach ($data as $product) {
                    for ($i = 0; $i < 8; $i++) {
                        $s = $section->products()->create([
                            'title' => [
                                'tm' =>  $product['title'],
                                'en' =>  $product['title'],
                                'ru' =>  $product['title'],
                            ],
                            'content' => [
                                'tm' =>  $product['content'],
                                'en' =>  $product['content'],
                                'ru' =>  $product['content'],
                            ],
                            'category_id' => $category->id,
                        ]);

                        $s->addMedia(public_path('seeder/' . $product['image']))->preservingOriginal()->toMediaCollection('products');
                    }
                }
            }
        }
    }
}
