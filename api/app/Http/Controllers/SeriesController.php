<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class SeriesController {
    public function index(Response $response)
    {
        return [
            'Elementary',
            'The Black List'
        ];
    }
}