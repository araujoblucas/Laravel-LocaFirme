<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Lucas',
            'email' => 'lucas@gmail',
            'role' => 'admin',
            'password' => Hash::make('12345679'),
        ]);
        DB::table('users')->insert([
            'name' => 'Luan',
            'email' => 'luan@gmail',
            'role' => 'user',
            'password' => Hash::make('12345679'),
        ]);
    }
}
