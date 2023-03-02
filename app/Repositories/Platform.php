<?php

namespace App\Repositories;

use App\Models\Platform as PlatformModel;

class Platform extends Base
{

    public function model()
    {
        return PlatformModel::class;
    }
}
