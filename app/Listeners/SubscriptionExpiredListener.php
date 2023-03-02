<?php

namespace App\Listeners;

use App\Events\SubscriptionExpired;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SubscriptionExpiredListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param \App\Events\SubscriptionExpired $event
     * @return void
     */
    public function handle(SubscriptionExpired $event)
    {
        if (isset($event->app->Subscriber)) {
            $event->app->Subscriber()->status = "expired";
            $event->app->Subscriber->save();
            Mail::fake();
            Mail::raw(
                'hi, an account has been expired. this credential is: user_id='
                . $event->app->Subscriber->UID . ', and app id='
                . $event->app->Subscriber->APPID,
                function ($message) {
                    $message->to(config('idk.admin.email'));
                    $message->subject('User subscription has been expired!');
                });
        }
    }
}
