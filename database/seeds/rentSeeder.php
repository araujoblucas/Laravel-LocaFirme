<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class rentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rents')->insert([
            'movie_id' => 1,
            'user_id' => 1,
            'status' => 'alugado',
            'returnDate' => 0,
            'rentDate' => 0,
        ]);
        DB::table('rents')->insert([
            'movie_id' => 1,
            'user_id' => 2,
            'status' => 'alugado',
            'returnDate' => 0,
            'rentDate' => 0,
        ]);
    }
}
