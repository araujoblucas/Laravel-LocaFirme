<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class moviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->insert([
            'id' => 1,
            'name' => 'Rei Leão',
            'info' => 'Exibido pela Netflix, O Poço conta a história de um lugar misterioso, uma prisão indescritível, um buraco profundo. Dois reclusos que vivem em cada nível. Um número desconhecido de níveis. Uma plataforma descendente contendo comida para todos eles. Uma luta desumana pela sobrevivência, mas também uma oportunidade de solidariedade',
            'image' => 'https://br.web.img3.acsta.net/pictures/19/05/07/20/54/2901026.jpg',
            'genre' => 'comedy',
            'year' => 2020,
        ]);

        DB::table('movies')->insert([
            'id' => 2,
            'name' => 'Extremety',
            'info' => 'Exibido pela Netflix, O Poço conta a história de um lugar misterioso, uma prisão indescritível, um buraco profundo. Dois reclusos que vivem em cada nível. Um número desconhecido de níveis. Uma plataforma descendente contendo comida para todos eles. Uma luta desumana pela sobrevivência, mas também uma oportunidade de solidariedade',
            'image' => 'https://media.fstatic.com/PLJNsnKgTmJZznKfXlUuHRJFdDE=/fit-in/290x478/smart/media/movies/covers/2018/09/extre.png',
            'genre' => 'horror',
            'year' => 2020,
        ]);

        DB::table('movies')->insert([
            'id' => 3,
            'name' => 'Tucker & Dale VS. Evil',
            'info' => 'Exibido pela Netflix, O Poço conta a história de um lugar misterioso, uma prisão indescritível, um buraco profundo. Dois reclusos que vivem em cada nível. Um número desconhecido de níveis. Uma plataforma descendente contendo comida para todos eles. Uma luta desumana pela sobrevivência, mas também uma oportunidade de solidariedade',
            'image' => 'https://media.fstatic.com/5ab5m-Yrx2VM4CnJQK4WRj1Icic=/fit-in/290x478/smart/media/movies/covers/2011/07/cdff564fcce40cfb2cc9bfdd3835da87.jpg',
            'genre' => 'comedy, horror',
            'year' => 2020,
        ]);
    }
}
