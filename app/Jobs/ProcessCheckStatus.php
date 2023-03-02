<?php

namespace App\Jobs;

use App\Classes\SubscriptionCheckerFactory as Checker;
use App\Models\Platform;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessCheckStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {
        //
    }

    public function handle()
    {
        return Platform::all()->each(function ($platform){
            Checker::Build($platform)->DoCheck();
        });
    }
}
