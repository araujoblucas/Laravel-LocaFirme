<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Checador extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:checador';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Muda o status dos aluguéis de alugado para devolvido no dia de retorno';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $today = now();
        DB::table('rents')->whereDate('returnDate', '<=', $today)->update(['status' => "devolvido"]);

        echo ('okay');
    }
}
