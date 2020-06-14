<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        // $this->call('moviesSeeder');
        // $this->call('stockSeeder');
        // $this->call('userSeeder');
        // $this->call('likeSeeder');
        $this->call('rentSeeder');
    }
}
