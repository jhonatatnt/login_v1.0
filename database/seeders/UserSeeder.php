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
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Jhonata',
            'last_name' => 'Silva',
            'email' => 'jhonata.silva@sygest.com.br',
            'password' => Hash::make('B3terrab@')
        ]);

        DB::table('users')->insert([
            'name' => 'Wanderson',
            'last_name' => 'Mandu',
            'email' => 'wanderson.mandu@sygest.com.br',
            'password' => Hash::make('Mandu@123')
        ]);

        DB::table('users')->insert([
            'name' => 'Bruna',
            'last_name' => 'Samara',
            'email' => 'bruna.samara@sygest.com.br',
            'password' => Hash::make('Samara@123')
        ]);

        DB::table('users')->insert([
            'name' => 'Vinicius',
            'last_name' => 'Melo',
            'email' => 'vinicius.silva@sygest.com.br',
            'password' => Hash::make('Melo@123')
        ]);

        DB::table('users')->insert([
            'name' => 'Vanderson',
            'last_name' => 'Moura',
            'email' => 'vanderson.silva@sygest.com.br',
            'password' => Hash::make('Moura@123')
        ]);
    }
}
