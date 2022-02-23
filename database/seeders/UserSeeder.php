<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'uuid' => Str::uuid(),
                'name' => 'Ahmadi',
                'email' => 'madi@digipark.go.id',
                'password' => bcrypt('secret'),
                'phone_number' => '0812341234',
                'photo_path' => 'Gamteng.jpg',
            ],
        ];

        DB::table('users')->insert($users);
    }
}
