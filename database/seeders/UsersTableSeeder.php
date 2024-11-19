<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'profile_image' => null,
                'name' => 'Test Company',
                'email' => 'company@gmail.com',
                'password' => Hash::make('test123'),
                'role' => 'company_admin',
                'user_disabled_at' => null,
                'email_verified_at' => now(),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'profile_image' => null,
                'name' => 'Test Customer',
                'email' => 'customer@gmail.com',
                'password' => Hash::make('test123'),
                'role' => 'customer',
                'user_disabled_at' => null,
                'email_verified_at' => now(),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'profile_image' => null,
                'name' => 'Test Vendor',
                'email' => 'vendor@gmail.com',
                'password' => Hash::make('test123'),
                'role' => 'vendor',
                'user_disabled_at' => null,
                'email_verified_at' => now(),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'profile_image' => null,
                'name' => 'Test User',
                'email' => 'user@gmail.com',
                'password' => Hash::make('test123'),
                'role' => 'user',
                'user_disabled_at' => null,
                'email_verified_at' => now(),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
