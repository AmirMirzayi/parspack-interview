<?php

namespace App\Classes\Checker;

use App\Models\ExpirationHistory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

abstract class Base
{
    protected static int $counter = 0;

    /**
     * @return void
     */
    public function DoCheck(): void
    {
        Http::fake([
            $this->checker->url . '*' => $this->GenerateResponse()
        ]);
        $this->checker->Apps->each(function ($app) {
            $this->CheckStatus($app);
        });

        $this->SaveLog();
    }

    protected function GenerateResponse()
    {
        return rand(0, 1) ?
            Http::response(static::SUCCESS, 200) :
            Http::response(static::FAIL, 500);
    }

    private function SaveLog(){

        // save log of expired accounts
        $history = ExpirationHistory::query()
            ->where("at_date", Carbon::now()->format('Y-m-d'))
            ->where("platform_id", $this->checker->id);
        if($history->exists()){
            $history = $history->first();
            $history->expired_counts += self::$counter;
        }
        else{
            ExpirationHistory::create([
                "at_date" => Carbon::now()->format('Y-m-d'),
                "expired_count" => self::$counter,
                "platform_id" => $this->checker->id
            ]);
        }
    }
}
