<?php

namespace App\Console\Commands;

use App\Jobs\OrderCompleted;
use App\Models\Subscription;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class ProduceKafka extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kafka:produce';

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
        $order = Subscription::first();

        OrderCompleted::dispatch($order->toArray())->onConnection('kafka');

    }
}
