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
            'likes' => 2,
            'genre' => 'comedy',
            'year' => 2020,
        ]);

        DB::table('movies')->insert([
            'id' => 2,
            'name' => 'Extremety',
            'info' => 'Exibido pela Netflix, O Poço conta a história de um lugar misterioso, uma prisão indescritível, um buraco profundo. Dois reclusos que vivem em cada nível. Um número desconhecido de níveis. Uma plataforma descendente contendo comida para todos eles. Uma luta desumana pela sobrevivência, mas também uma oportunidade de solidariedade',
            'image' => 'https://media.fstatic.com/PLJNsnKgTmJZznKfXlUuHRJFdDE=/fit-in/290x478/smart/media/movies/covers/2018/09/extre.png',
            'likes' => 0,
            'genre' => 'horror',
            'year' => 2020,
        ]);

        DB::table('movies')->insert([
            'id' => 3,
            'name' => 'Tucker & Dale VS. Evil',
            'info' => 'Exibido pela Netflix, O Poço conta a história de um lugar misterioso, uma prisão indescritível, um buraco profundo. Dois reclusos que vivem em cada nível. Um número desconhecido de níveis. Uma plataforma descendente contendo comida para todos eles. Uma luta desumana pela sobrevivência, mas também uma oportunidade de solidariedade',
            'image' => 'https://media.fstatic.com/5ab5m-Yrx2VM4CnJQK4WRj1Icic=/fit-in/290x478/smart/media/movies/covers/2011/07/cdff564fcce40cfb2cc9bfdd3835da87.jpg',
            'likes' => 0,
            'genre' => 'comedy, horror',
            'year' => 2020,
        ]);

        DB::table('movies')->insert([
            'id' => 4,
            'name' => 'Venom',
            'info' => 'O jornalista Eddie Brock desenvolve força e poder sobre-humanos quando seu corpo se funde com o alienígena Venom. Dominado pela raiva, Venom tenta controlar as novas e perigosas habilidades de Eddie.',
            'image' => 'https://lojasaraiva.vteximg.com.br/arquivos/ids/373806/1006625118.jpg?v=636968125999330000',
            'likes' => 0,
            'genre' => 'action, comedy',
            'year' => 2020,
        ]);

        DB::table('movies')->insert([
            'id' => 5,
            'name' => '5 Onda',
            'info' => 'epois da primeira onda, só restou a escuridão. Depois da segunda onda, somente os que tiveram sorte sobreviveram. Depois da terceira onda, somente os que não tiveram sorte sobreviveram. Depois da quarta onda, só há uma regra: não confie em ninguém. Agora A QUINTA ONDA está começando... Cassie está sozinha, fugindo dos Outros. Ela vive em uma Terra devastada, onde qualquer pessoa, até mesmo uma criança, pode ser o inimigo.',
            'image' => 'https://a-static.mlcdn.com.br/618x463/5-onda-a-capa-do-filme-02-ed-fundamento/apaginadistribuidoradelivros/9788539513642/2abcfc0c71b8b671f45aac2f57bbebd0.jpg',
            'likes' => 0,
            'genre' => 'suspense, horror',
            'year' => 2013,
        ]);
        DB::table('movies')->insert([
            'id' => 6,
            'name' => 'A cabana',
            'info' => 'Durante uma viagem de fim de semana, a filha mais nova de Mack Allen Phillips é raptada e evidências de que ela foi brutalmente assassinada são encontradas numa velha cabana. Após quatro anos vivendo numa tristeza profunda causada pela culpa e pela saudade da menina, Mack recebe um estranho bilhete, aparentemente escrito por Deus, convidando-o a voltar à cabana onde acontecera a tragédia. Apesar de desconfiado, ele vai ao local numa tarde de inverno e adentra passo a passo o cenário de seu mais terrível pesadelo.',
            'image' => 'https://static.carrefour.com.br/medias/sys_master/images/images/hba/hae/h00/h00/10226939559966.jpg',
            'likes' => 0,
            'genre' => 'drama',
            'year' => 2017,
        ]);
        DB::table('movies')->insert([
            'id' => 7,
            'name' => 'Privacidade Violada',
            'info' => 'Um casal passa o fim de semana em uma casa de férias no campo italiano, na tentativa de reparar o relacionamento, mas logo se torna vítima dos planos sinistros do proprietário da casa.',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRDIUUskSmdfJK6swaaERlGII9rxyRKox8GnBtoKU6_wtUYS8Nr&usqp=CAU',
            'likes' => 0,
            'genre' => 'suspense',
            'year' => 2019,
        ]);
        DB::table('movies')->insert([
            'id' => 8,
            'name' => 'Busca Alucinante',
            'info' => 'Kevin (Dean Cain) vai ao hospital fazer uma cirurgia simples. Quando Mary (Brittany Murphy), sua namorada, chega para buscá-lo no dia seguinte, ele desapareceu. Pior, não há sequer registro de sua presença. Um psiquiatra a declara instável e Mary precisa lutar para encontrar seu namorado e provar sua sanidade.',
            'image' => 'https://br.web.img3.acsta.net/pictures/210/284/21028450_20130814184725792.jpg',
            'genre' => 'suspense, horror',
            'likes' => 0,
            'year' => 2011,
        ]);
    }
}
