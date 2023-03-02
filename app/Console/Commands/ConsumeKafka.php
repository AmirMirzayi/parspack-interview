<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ConsumeKafka extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'consume';

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
        $conf = new \RdKafka\Conf();

        $conf->set('bootstrap.servers', env('BOOTSTRAP_SERVER'));
        $conf->set('group.id', env('GROUP_ID'));
        $consumer = new \RdKafka\KafkaConsumer($conf);
        while(true){
            $consumer->subscribe(['default']);
            $message = $consumer->consume(120 * 100);
            var_dump($message->payload);
        }
    }
}
