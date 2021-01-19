<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'title' => 'Admin',
                'description' => 'Full Access'
            ],
            [
                'title' => 'HR',
                'description' => 'HR level Access'
            ],
            [
                'title' => 'Waiter',
                'description' => 'Waiter Access'
            ],
            [
                'title' => 'Chef',
                'description' => 'Chef Access'
            ],
            [
                'title' => 'Guest',
                'description' => 'Guest Access'
            ]
        ];

        DB::table('roles')->insert($roles);
    }
}
