<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $business_categories = [
            [
                'uuid' => Str::uuid(),
                'category' => 'Digital',
                'order_number' => 1,
                'status' => 1,
                'gallery_uuid' => '1',
            ],
            [
                'uuid' => Str::uuid(),
                'category' => 'F & B',
                'order_number' => 2,
                'status' => 1,
                'gallery_uuid' => '1',
            ],
            [
                'uuid' => Str::uuid(),
                'category' => 'Lifestyle',
                'order_number' => 3,
                'status' => 1,
                'gallery_uuid' => '1',
            ],
            [
                'uuid' => Str::uuid(),
                'category' => 'Culture & Art',
                'order_number' => 4,
                'status' => 1,
                'gallery_uuid' => '1',
            ],
        ];

        DB::table('business_categories')->insert($business_categories);
    }
}
