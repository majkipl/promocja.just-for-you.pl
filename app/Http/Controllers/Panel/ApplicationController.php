<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $applications = Application::all();

        return view('panel/application/index');
    }

    /**
     * @param Application $application
     * @return View
     */
    public function show(Request $request, int $id): View
    {
        $application = Application::with(['voivodeship','product','shop','where','free'])
            ->where('id','=',$id)->first();
        return view('panel/application/show', [
            'application' => $application
        ]);
    }
}
