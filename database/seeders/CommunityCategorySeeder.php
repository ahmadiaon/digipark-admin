<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommunityCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $community_categories = [
            [
                'uuid' => Str::uuid(),
                'category' => 'Social Culture',
                'order_number' => 1,
                'status' => 1,
                'gallery_uuid' => '1',
            ],
            [
                'uuid' => Str::uuid(),
                'category' => 'Entrepreneur',
                'order_number' => 2,
                'status' => 1,
                'gallery_uuid' => '1',
            ],
            [
                'uuid' => Str::uuid(),
                'category' => 'Art & Digital',
                'order_number' => 3,
                'status' => 1,
                'gallery_uuid' => '1',
            ],
            [
                'uuid' => Str::uuid(),
                'category' => 'Sport',
                'order_number' => 4,
                'status' => 1,
                'gallery_uuid' => '1',
            ],
        ];

        DB::table('community_categories')->insert($community_categories);
    }
}
