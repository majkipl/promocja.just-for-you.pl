<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOpinionRequest;
use App\Models\Free;
use App\Services\OpinionService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class FormOpinionController extends Controller
{
    public function __construct(protected OpinionService $opinionService)
    {
    }

    public function index()
    {
        if (Cache::has('freebies')) {
            $freebies = Cache::get('freebies');
        } else {
            $freebies = Free::all();
            Cache::put('freebies', $freebies, now()->addDay(365));
        }

        return view(
            'form/opinion/index',
            [
                'freebies' => $freebies,
            ]
        );
    }

    public function save(StoreOpinionRequest $request)
    {
        try {
            $this->opinionService->store(
                $request->validated(),
                $request->all()
            );

            $this->opinionService->sendMail($request->input('email'));

            return response()->json(
                [
                    'status' => 'success',
                    'results' => [
                        'url' => route( 'thx.opinion')
                    ]
                ],
                Response::HTTP_OK
            );
        } catch (Exception $e) {
            return response()->json(
                [
                    'errors' => [
                        'main' => [
                            'Nie możemy dodać Twojej opinii, aby rozwiązać problem skontaktuj się z administratorem serwisu.'
                        ]
                    ],
                    'message' => 'Wewnętrzny błąd serwisu.'
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }
}
