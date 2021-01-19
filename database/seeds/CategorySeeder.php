<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cats = [
            [
                'title' => 'Appetizers',
                'description' => 'Appetizers',
            ],
            [
                'title' => 'Breakfast',
                'description' => 'Breakfast',
            ],
            [
                'title' => 'Desserts',
                'description' => 'Desserts',
            ],
            [
                'title' => 'Drinks',
                'description' => 'Drinks',
            ],
            [
                'title' => 'Lunch',
                'description' => 'Lunch',
            ],
            [
                'title' => 'Mains',
                'description' => 'Mains',
            ],
            [
                'title' => 'Fast Food',
                'description' => 'Fast Food',
            ],
            [
                'title' => 'Specials',
                'description' => 'Specials',
            ],

        ];
        
        DB::table('categories')->insert($cats);
    }
}
