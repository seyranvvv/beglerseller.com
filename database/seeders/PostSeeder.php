<?php

namespace Database\Seeders;

use App\Models\Section;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections  = Section::all();

        $data = array(
            [
                'title' => 'Which allows you to pay down insurance bills',
                'content' => "There are many variations of passages of Lorem Ipsum available, but majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum. Suspendisse ultricies vestibulum vehicula. Proin laoreet porttitor lacus. Duis auctor vel ex eu elementum. Fusce eu volutpat felis. Proin sed eros tincidunt, sagittis sapien eu, porta diam. Aenean finibus scelerisque nulla non facilisis. Fusce vel orci sed quam gravida condimentum. Aliquam condimentum, massa vel mollis volutpat, erat sem pharetra quam, ac mattis arcu elit non massa. Nam mollis nunc velit, vel varius arcu fringilla tristique. Cras elit nunc, sagittis eu bibendum eu, ultrices placerat sem. Praesent vitae metus dolor. Nulla a erat et orci mattis auctor.
                            Mauris non dignissim purus, ac commodo diam. Donec sit amet lacinia nulla. Aliquam quis purus in justo pulvinar tempor. Aliquam tellus nulla, sollicitudin at euismod nec, feugiat at nisi. Quisque vitae odio nec lacus interdum tempus. Phasellus a rhoncus erat. Vivamus vel eros vitae est aliquet pellentesque vitae et nunc. Sed vitae leo vitae nisl pellentesque semper.",

                'datetime' => now()->format('Y-m-d'),
                'image' => 'post.jpg',
            ],
        );


        foreach ($sections as $section) {
            foreach ($data as $post) {
                for ($i = 0; $i < 3; $i++) {
                    $p = $section->posts()->create(
                        [
                            'title' => [
                                'fr' =>  $post['title'],
                                'en' =>  $post['title'],
                                'ru' =>  $post['title'],
                            ],
                            'content' => [
                                'fr' =>  $post['content'],
                                'en' =>  $post['content'],
                                'ru' =>  $post['content'],
                            ],
                            'datetime' => $post['datetime']
                        ],
                    );
                    $p->addMedia(public_path('seeder/' . $post['image']))->preservingOriginal()->toMediaCollection('posts');
                }
            }
        }
    }
}
