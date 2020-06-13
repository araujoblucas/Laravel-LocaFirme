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
            'qnt' => 2,
            'available' => 0,
            'rented' => 2,
        ]);

        DB::table('stock')->insert([
            'movie_id' => 2,
            'qnt' => 1,
            'available' => 1,
            'rented' => 0,
        ]);

        DB::table('stock')->insert([
            'movie_id' => 3,
            'qnt' => 1,
            'available' => 1,
            'rented' => 0,
        ]);
        DB::table('stock')->insert([
            'movie_id' => 4,
            'qnt' => 3,
            'available' => 3,
            'rented' => 0,
        ]);
        DB::table('stock')->insert([
            'movie_id' => 5,
            'qnt' => 1,
            'available' => 1,
            'rented' => 0,
        ]);
        DB::table('stock')->insert([
            'movie_id' => 6,
            'qnt' => 4,
            'available' => 4,
            'rented' => 0,
        ]);
        DB::table('stock')->insert([
            'movie_id' => 7,
            'qnt' => 3,
            'available' => 3,
            'rented' => 0,
        ]);
        DB::table('stock')->insert([
            'movie_id' => 8,
            'qnt' => 2,
            'available' => 2,
            'rented' => 0,
        ]);
    }
}
