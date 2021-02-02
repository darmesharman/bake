<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Redis;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

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

 
    public function iterate() 
    {
        $index = 1;
        $selects='';
        $joins='';
        
        // $last_update = DB::select(DB::raw('select MAX(updated_at) as updated_at from updates'))
        // [0]->updated_at;

        $data = Redis::hgetall('user_tokens');

        foreach($data as $token=>$date) {
            $selects= $selects.", GROUP_CONCAT(si".$index.".details) as details_".$index;
            $joins= $joins." LEFT JOIN (SELECT * FROM updates where updated_at > '".$date."' ) AS si".$index."  ON si.id = si".$index.".id ";
            $index+=1;
        }
        $query= "SELECT si.event".$selects." FROM updates AS si ".$joins." group by si.event";

        $updates = DB::select(DB::raw($query));

        $last_update = DB::select(DB::raw('select MAX(updated_at) as updated_at from updates'))
        [0]->updated_at;
        foreach($data as $token=>$date) {
            $data[$token] = $last_update;
        }

        Redis::hmset('user_tokens', $data);


        // Broadcast
        Redis::publish('updates', json_encode([$index, $updates]
            
            // ['id' => 0, 'name' => 'Adam Wathan'],
            // ['id' => 1, 'name' => 'Adam Stetham'],
            // ['id' => 2, 'name' => 'Adam Stork'],
        ));
    }
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        for ($i=0; $i < 20; $i++) { 
            $this->iterate();
            sleep(3);
        }
        
    }
}
