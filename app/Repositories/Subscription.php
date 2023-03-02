<?php

namespace App\Repositories;

use App\Models\Subscription as SubscriptionModel;

class Subscription extends Base
{

    public function model()
    {
        return SubscriptionModel::class;
    }
}
