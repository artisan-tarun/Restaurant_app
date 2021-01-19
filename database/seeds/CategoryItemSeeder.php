<?php

use Illuminate\Database\Seeder;

class CategoryItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Category::class, 8)->create()->each(function($cat)
        {
            $cat->items()->saveMany(factory(App\Item::class,5)->make());
        }
        );
    }
}
