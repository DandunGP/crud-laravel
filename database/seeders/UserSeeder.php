<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
                'username' => 'admin',
                'password' => Hash::make('admin123'),
                'status' => 'admin'
            ],
            [
                'username' => 'member',
                'password' => Hash::make('member'),
                'status' => 'member'
            ]
        ];
        User::insert($users);
    }
}
