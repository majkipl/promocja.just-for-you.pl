<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThxApplicationController extends Controller
{
    public function index(Request $request, $id)
    {
        return view('thx/application/index', [
            'id' => $id
        ]);
    }
}
