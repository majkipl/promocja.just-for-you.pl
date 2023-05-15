<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Opinion;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class OpinionController extends Controller
{
    public function index(): View
    {
        $opinions = Opinion::all();

        return view('panel/opinion/index', [
           'opinions' => $opinions
        ]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return View
     */
    public function show(Request $request, int $id): View
    {
        $opinion = Opinion::with(['free'])
            ->where('id','=',$id)->first();
        return view('panel/opinion/show', [
            'opinion' => $opinion
        ]);
    }
}


