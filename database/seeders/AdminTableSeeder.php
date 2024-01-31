<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $password = Hash::make('password');
        $admin = [
            [
                "id" => 1,
                "first_name" => 'Shishir',
                "middle_name" => '',
                "last_name" => 'Kumar',
                "email" => 'admin@sky.com',
                "phone" => '8052785942',
                "password" => $password,
                "role_id" => 1,
                "status" => 'active',
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
        ];

        Admin::insert($admin);
    }
}
