<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller{
    public function index(Request $request){
        $series = ["Breaking Bad","Elementary","Sherlock Holmes"];    
        return view('series.index',compact('series'));
    }
}