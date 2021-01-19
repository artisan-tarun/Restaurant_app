<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
                'name' => 'Tarun Chauhan',
                'role_id' => 1,
                'email' => 'artisan.tarun@gmail.com',
                'password' => Hash::make('tarun@123'),
                'role_id' => 1,
            ],
            [
                'name' => 'Priya Chauhan',
                'role_id' => 1,
                'email' => 'priya@gmail.com',
                'password' => Hash::make('priya@123'),
                'role_id' => 2
            ],
            [
                'name' => 'Arun Chauhan',
                'role_id' => 1,
                'email' => 'Arun@gmail.com',
                'password' => Hash::make('arun@123'),
                'role_id' => 3
            ]
            ];
            DB::table('users')->insert($users);

            factory(App\User::class, 30)->create();
    }
}
