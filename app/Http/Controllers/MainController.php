<?php

namespace App\Http\Controllers;


use App\Models\Story;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $stories = Story::all();

        return view('index',['stories'=>$stories]);
    }

    public function add()
    {
        return view('add');
    }
}
