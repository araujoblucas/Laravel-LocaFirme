<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class likeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

    DB::table('likes')->insert([
        'id' => 1,
        'movie_id' => 1,
        'user_id' => 1
    ]);
    DB::table('likes')->insert([
        'id' => 2,
        'movie_id' => 1,
        'user_id' => 2
    ]);

    }

}
