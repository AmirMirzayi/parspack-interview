<?php

namespace App\Jobs;

use App\Classes\Contract\CheckerInterface as IChecker;
use App\Models\Platform;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RecheckStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Platform $checker;
    private $referrer;

    /**
     * @param Platform $checker
     */
    public function __construct($checker, $referrer)
    {
        $this->checker = $checker;
        $this->referrer = $referrer;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        (new $this->referrer($this->checker))->DoCheck();
    }
}
