<?php

namespace App\Http\Controllers;

use App\Repositories\App;
use Illuminate\Support\Facades\Response;

class AppController extends Controller
{
    public function __invoke(App $app)
    {
        return Response::result($app->withRelation('Platform')->get());
    }
}
