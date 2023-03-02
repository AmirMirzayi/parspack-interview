<?php

namespace App\Http\Controllers;

use App\Repositories\History;
use Illuminate\Support\Facades\Response;

class HistoryController extends Controller
{
    public function __invoke(History $history){
        return Response::result($history->withRelation('platform')->get());
    }
}
