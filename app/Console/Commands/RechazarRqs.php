<?php

namespace App\Console\Commands;
use Carbon\Carbon;
use DB;

use Illuminate\Console\Command;

class RechazarRqs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rechazar:rqs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $ochodiasdespues = Carbon::now()->subDays(8);
        $estadoinactivo = 3;

        DB::table('compras')
            ->where('created_at', '<=', $ochodiasdespues)
            ->where('estado', '<>', $estadoinactivo)
            ->update(['estado' => $estadoinactivo]);
    }
}
