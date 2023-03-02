<?php

namespace App\Classes\Checker;

use App\Classes\Contract\CheckerInterface;
use App\Events\SubscriptionExpired;
use App\Jobs\RecheckStatus;
use App\Models\Platform;
use Illuminate\Support\Facades\Http;

class GooglePlay extends Base implements CheckerInterface
{
    protected const SUCCESS = ['status' => 'active'];
    protected const FAIL = ['msg' => 'not working as i expected'];
    protected Platform $checker;

    /**
     * @param Platform $checker
     */
    public function __construct($checker){
        $this->checker = $checker;
    }

    public function CheckStatus($app)
    {
        $url = $this->checker->url . '/' . $app->id;
        $ans = Http::get($url);
        if ($ans->ok()) {
            if (current(array_diff($ans->json(), self::SUCCESS))) {
                SubscriptionExpired::dispatch($app);
                parent::$counter++;
            }
        }
        else{
            RecheckStatus::dispatch($this->checker, GooglePlay::class)->delay(
                now()->addHours($this->checker->retry_after_hours)
            );
        }
    }
}
