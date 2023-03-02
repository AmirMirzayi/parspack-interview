<?php

namespace App\Repositories;

use App\Models\App as AppModel;

class App extends Base
{

    public function model()
    {
        return AppModel::class;
    }
}
