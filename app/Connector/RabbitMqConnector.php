<?php

namespace App\Connector;

use App\Queues\RabbitMqQueue;
use Illuminate\Queue\Connectors\ConnectorInterface;
use PhpAmqpLib\Connection\AMQPStreamConnection;

class RabbitMqConnector implements ConnectorInterface
{

    /**
     * Establish a queue connection.
     *
     * @param array $config
     * @return \Illuminate\Contracts\Queue\Queue
     */
    public function connect(array $config)
    {
        $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        return new RabbitMqQueue($connection);
    }
}
