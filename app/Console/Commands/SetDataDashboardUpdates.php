<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Redis;
use Illuminate\Console\Command;

class SetDataDashboardUpdates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:set-data-dashboard-updates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {

        // Query

        // Broadcast
        Redis::publish('updates', json_encode([
            ['id' => 0, 'name' => 'Adam Wathan'],
            ['id' => 1, 'name' => 'Adam Stetham'],
            ['id' => 2, 'name' => 'Adam Stork'],
        ]));
        
        // return 0;
    }
}
