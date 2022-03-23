<?php

namespace App\Http\Controllers;

use App\Series;
use Illuminate\Http\Response;

class SeriesController {
    public function index(Response $response)
    {
        return Series::all();
    }
}