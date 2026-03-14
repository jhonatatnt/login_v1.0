<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'           => 'User',
            'lastname'       => 'Root',
            'email'          => 'root@email.com.br',
            'password'       => Hash::make('123123'),

            // Campos adicionais da migration
            'confirm_email'  => 'sim',
            'role_user'      => 3, // super admin
            'date_creation'  => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
