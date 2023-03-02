<?php

namespace App\Http\Controllers;

use App\Repositories\User;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    public function __invoke(User $user)
    {
        return Response::result($user->withRelation([
            'Apps',
            'Subscription.App.Platform'
            ])->whereHas('Subscription')
            ->whereHas('Apps')
            ->get());
    }
}
