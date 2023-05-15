<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicationRequest;
use App\Models\Free;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Voivodeship;
use App\Models\Where;
use App\Services\ApplicationService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class FormApplicationController extends Controller
{
    public function __construct(protected ApplicationService $applicationService)
    {
        //
    }

    public function index()
    {
        return view(
            'form/application/index',
            [
                'voivodeships' => Voivodeship::getAllCached(),
                'products' => Product::getAllCached(),
                'shops' => Shop::getAllCached(),
                'freebies' => Free::getAllCached(),
                'wheres' => Where::getAllCached()
            ]
        );
    }

    public function save(StoreApplicationRequest $request)
    {
        try {
            $application = $this->applicationService->store(
                $request->validated(),
                $request->file('img_receipt'),
                $request->file('img_ean'),
                $request->all()
            );

            $this->applicationService->sendMail($request->input('email'), $application->id);

            return response()->json(
              [
                  'status' => 'success',
                  'results' => [
                      'url' => route( 'thx.app', ['id' => $application->id])
                  ]
              ],
              Response::HTTP_OK
            );
        } catch (Exception $e) {
            return response()->json(
                [
                    'errors' => [
                        'main' => [
                            'Nie możemy dodać Twojego zgłoszenia, aby rozwiązać problem skontaktuj się z administratorem serwisu.'
                        ]
                    ],
                    'message' => 'Wewnętrzny błąd serwisu.'
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }
}
