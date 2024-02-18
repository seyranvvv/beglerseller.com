<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objects = array(
            ['admin', 'admin', 'admin45', range(1, 24)],
        );
        foreach ($objects as $object) {
            $obj = new User();
            $obj->name = $object[0];
            $obj->username = $object[1];
            $obj->password = bcrypt($object[2]);
            $obj->active = true;
            $obj->save();
        }
    }
}
