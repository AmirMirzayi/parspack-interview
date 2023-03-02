<?php

namespace App\Repositories;

use App\Models\User as UserModel;

class User extends Base
{

    public function model()
    {
        return UserModel::class;
    }
}
