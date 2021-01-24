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
                'email' => 'artisan.tarun@gmail.com',
                'password' => Hash::make('tarun@123'),
                'role_id' => 1,
            ],
            [
                'name' => 'Priya Chauhan',
                'email' => 'priya@gmail.com',
                'password' => Hash::make('priya@123'),
                'role_id' => 2
            ],
            [
                'name' => 'Arun Chauhan',
                'email' => 'Arun@gmail.com',
                'password' => Hash::make('arun@123'),
                'role_id' => 3
            ],
            [
                'name' => 'Varun Chauhan',
                'email' => 'varun@gmail.com',
                'password' => Hash::make('arun@123'),
                'role_id' => 4
            ],
            [
                'name' => 'Table No 1',
                'role_id' => 5,
                'email' => 'table1@gmail.com',
                'password' => Hash::make('table1@123'),
            ],
            [
                'name' => 'Table No 2',
                'role_id' => 5,
                'email' => 'table2@gmail.com',
                'password' => Hash::make('table2@123'),
            ],
            [
                'name' => 'Table No 3',
                'role_id' => 5,
                'email' => 'table3@gmail.com',
                'password' => Hash::make('table3@123'),
            ],
            [
                'name' => 'Table No 4',
                'role_id' => 5,
                'email' => 'table4@gmail.com',
                'password' => Hash::make('table4@123'),
            ],
            [
                'name' => 'Table No 5',
                'role_id' => 5,
                'email' => 'table5@gmail.com',
                'password' => Hash::make('table5@123'),
            ],
            [
                'name' => 'Table No 6',
                'role_id' => 5,
                'email' => 'table6@gmail.com',
                'password' => Hash::make('table6@123'),
            ],
            [
                'name' => 'Table No 7',
                'role_id' => 5,
                'email' => 'table7@gmail.com',
                'password' => Hash::make('table7@123'),
            ],
            [
                'name' => 'Table No 8',
                'role_id' => 5,
                'email' => 'table8@gmail.com',
                'password' => Hash::make('table8@123'),
            ],
            [
                'name' => 'Table No 9',
                'role_id' => 5,
                'email' => 'table9@gmail.com',
                'password' => Hash::make('table9@123'),
            ],
            [
                'name' => 'Table No 10',
                'role_id' => 5,
                'email' => 'table10@gmail.com',
                'password' => Hash::make('table10@123'),
            ]
            
            ];
            DB::table('users')->insert($users);
    }
}
