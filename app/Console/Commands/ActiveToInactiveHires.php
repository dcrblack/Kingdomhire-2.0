<?php

namespace App\Console\Commands;

use App\Hire;
use DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ActiveToInactiveHires extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scheduler:active-to-inactive-hires';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set past active hires to inactive hires';

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
        $hires = Hire::whereIsActive(true)->get();
        foreach($hires as $hire) {
            if($hire->end_date <= date('Y-m-d')) {
                DB::table('hires')
                    ->where('id', '=', $hire->id)
                    ->update(['is_active' => false]);

                DB::table('vehicles')
                    ->where('id', '=', $hire->vehicle->id)
                    ->update(['status' => 'Available']);

                Log::channel('cron')->info("[ActiveToInactiveHires] Active hire [id = ".$hire->id.
                    ", start_date = ".$hire->start_date.", end_date = ".$hire->end_date."] set to inactive");
            }
        }
    }
}
