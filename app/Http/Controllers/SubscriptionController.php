<?php

namespace App\Http\Controllers;

use App\Repositories\Subscription;

use Illuminate\Support\Facades\Response;

class SubscriptionController extends Controller
{
    public function __invoke(Subscription $subscription){
        return Response::result($subscription->withRelation([
            'User',
            'App.Platform'
        ])->get());
    }
}
