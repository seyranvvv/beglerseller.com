<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BannerType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(SectionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(CardTypeSeeder::class);
        $this->call(CardSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(BannerTypeSeeder::class);
        $this->call(BannerSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProductBannerSeeder::class);




        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
