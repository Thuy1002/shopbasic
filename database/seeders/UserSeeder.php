<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
                'name' => 'Mr.Thuy',
                'email' => 'thuy1002dangthanh@gmail.com',
                'password' => Hash::make(123456),
                'img' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQanlasPgQjfGGU6anray6qKVVH-ZlTqmuTHw&s',
                'role' => 'admin', //admin
                'status' => 'new', // chưa nghĩ ra
                'number_phone' => '0143456781',
                'address' => 'hà nội',
            ],
            [
                'name' => 'Mr.Thuy',
                'email' => 'dangthanhthuy022002@gmail.com',
                'password' => Hash::make(123456),
                'img' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQanlasPgQjfGGU6anray6qKVVH-ZlTqmuTHw&s',
                'role' => 'user', //usser
                'status' => 'new', // chưa nghĩ ra
                'number_phone' => '0143456781',
                'address' => 'hà nội',
            ],
        ];
        DB::table('users')->insert($users);
    }
    //php artisan db:seed --class=UserSeeder
}
