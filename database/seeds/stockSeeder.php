<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class stockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stock')->insert([
            'movie_id' => 1,
            'qnt' => 3,
            'available' => 3,
            'rented' => 0,
        ]);

        DB::table('stock')->insert([
            'movie_id' => 2,
            'qnt' => 5,
            'available' => 5,
            'rented' => 0,
        ]);

        DB::table('stock')->insert([
            'movie_id' => 3,
            'qnt' => 1,
            'available' => 1,
            'rented' => 0,
        ]);
    }
}
