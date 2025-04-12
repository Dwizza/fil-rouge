<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => 'admin',
            'email' =>'admin@g.c',
            'password' => Hash::make(11111111),
            'role_id' => 1,
            'phone' => '12345678',
            'address' => '123 Main St',
            'photo' => 'admin.jpg',
        ]);
    }
}
