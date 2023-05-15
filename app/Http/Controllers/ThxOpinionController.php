<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThxOpinionController extends Controller
{
    public function index()
    {
        return view('thx/opinion/index');
    }
}
