<?php

namespace App\Queues;

use Illuminate\Queue\Queue;
use Illuminate\Contracts\Queue\Queue as QueueContract;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMqQueue extends Queue implements QueueContract
{
    protected $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    /**
     * Get the size of the queue.
     *
     * @param string|null $queue
     * @return int
     */
    public function size($queue = null)
    {
        // TODO: Implement size() method.
    }

    /**
     * Push a new job onto the queue.
     *
     * @param string|object $job
     * @param mixed $data
     * @param string|null $queue
     * @return mixed
     */
    public function push($job, $data = '', $queue = null)
    {
        $channel = $this->connection->channel();
        $channel->queue_declare('hello', false, false, false, false);
        $msg = new AMQPMessage(serialize($job));
        $channel->basic_publish($msg, '', 'hello');
        $channel->close();
        $this->connection->close();
    }

    /**
     * Push a raw payload onto the queue.
     *
     * @param string $payload
     * @param string|null $queue
     * @param array $options
     * @return mixed
     */
    public function pushRaw($payload, $queue = null, array $options = [])
    {
        // TODO: Implement pushRaw() method.
    }

    /**
     * Push a new job onto the queue after (n) seconds.
     *
     * @param \DateTimeInterface|\DateInterval|int $delay
     * @param string|object $job
     * @param mixed $data
     * @param string|null $queue
     * @return mixed
     */
    public function later($delay, $job, $data = '', $queue = null)
    {
        // TODO: Implement later() method.
    }

    /**
     * Pop the next job off of the queue.
     *
     * @param string|null $queue
     * @return \Illuminate\Contracts\Queue\Job|null
     */
    public function pop($queue = null)
    {
        $channel = $this->connection->channel();
        $channel->queue_declare('hello', false, false, false, false);
        $channel->basic_consume('hello', '', false, true, false, false, function($msg){
            var_dump($msg->body);
        }
        );
        while ($channel->is_open()) {
            $channel->wait();
        }
    }
}
