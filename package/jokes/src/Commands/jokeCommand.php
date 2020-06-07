<?php

namespace Laracademy\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client ;
class jokeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'joke';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'make the dev laugh ';

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
        //
        $client = new Client();

        $response = $client->request('GET','https://icanhazdadjoke.com/api',[
            'headers' : [
                'Accept' => 'text/plain',
            ],
        ]);

        if($response->getStatusCode() != 200){
            $this->error('can not connect api');
        }

        $this->info((string)$response->getBody());
    }
}
