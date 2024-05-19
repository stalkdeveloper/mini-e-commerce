<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // --- Admin & User For Testing--- \\ 
        DB::table('users')->insert([
            'name'                   =>'Admin',
            'email'                   =>'admin@gmail.com',
            'usertype'              =>'admin',
            'email_verified_at' =>now(),
            'email_verified_at' =>now(),
            'created_at'           =>now(),
            'updated_at'          =>now(),
            'password'=>Hash::make('Admin@1234') // <---- check this
        ]);

        DB::table('users')->insert([
            'name'                   =>'User',
            'email'                   =>'user@gmail.com',
            'usertype'              =>'user',
            'email_verified_at' =>now(),
            'created_at'           =>now(),
            'updated_at'          =>now(),
            'password'=>Hash::make('User@1234') // <---- check this
        ]);

    }
}
