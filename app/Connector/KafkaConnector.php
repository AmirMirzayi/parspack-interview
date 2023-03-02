<?php

namespace App\Connector;

use App\Queues\KafkaQueue;
use Illuminate\Queue\Connectors\ConnectorInterface;

class KafkaConnector implements ConnectorInterface
{

    /**
     * @inheritDoc
     */
    public function connect(array $config)
    {
        $conf = new \RdKafka\Conf();

        $conf->set('bootstrap.servers', env('BOOTSTRAP_SERVER'));
        $producer = new \RdKafka\Producer($conf);

        $conf->set('group.id', env('GROUP_ID'));
        $consumer = new \RdKafka\KafkaConsumer($conf);

        return new KafkaQueue($consumer, $producer);
    }
}
