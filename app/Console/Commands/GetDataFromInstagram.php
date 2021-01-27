<?php

namespace App\Console\Commands;

use App\Models\Instagram;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetDataFromInstagram extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:get-data-from-instagram';

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
        $response = Http::withHeaders([
            'x-rapidapi-key' => 'b1b0f28180msh493efffa3933284p1d7893jsnaa78bf228dcc',
            'x-rapidapi-host' => 'instagram28.p.rapidapi.com',
        ])->get('https://instagram28.p.rapidapi.com/medias', [
            'user_id' => '2360245661',
            'batch_size' => '10',
        ]);

        Instagram::updateOrCreate(
            ['id' => 1],
            ['response' => $response->json()],
        );
    }
}
