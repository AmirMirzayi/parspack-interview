<?php

namespace App\Http\Controllers;

use App\Repositories\Platform;
use Illuminate\Support\Facades\Response;

class PlatformController extends Controller
{
    public function __invoke(Platform $platform){
        return Response::result($platform->withRelation('Apps')->get());
    }
}
