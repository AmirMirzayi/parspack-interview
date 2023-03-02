<?php

namespace App\Repositories;

use App\Models\ExpirationHistory as HistoryModel;

class History extends Base
{

    public function model()
    {
        return HistoryModel::class;
    }
}
