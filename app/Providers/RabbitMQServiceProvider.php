<?php

namespace App\Providers;

use App\Connector\RabbitMqConnector;
use Illuminate\Support\ServiceProvider;

class RabbitMQServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $manager = $this->app['queue'];

        $manager->addConnector('rabbitmq', function (){
            return new RabbitMqConnector;
        });
    }
}
