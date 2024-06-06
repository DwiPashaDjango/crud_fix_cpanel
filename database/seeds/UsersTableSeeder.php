<?php

use Illuminate\Database\Seeder;
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
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'role' => 'Admin',
            'site1' => 'H000',
            'site2' => 'J000',
            'site3' => 'K000',
            'site4' => 'L000',
            'site5' => 'M000',
            'site6' => 'N000',
            'site7' => 'O000',
            'site8' => 'P000',
            'site9' => 'Q000',
            'site10' => 'R000',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
