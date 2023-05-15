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
        if (Cache::has('voivodeships')) {
            $voivodeships = Cache::get('voivodeships');
        } else {
            $voivodeships = Voivodeship::all();
            Cache::put('voivodeships', $voivodeships, now()->addDay(365));
        }

        if (Cache::has('products')) {
            $products = Cache::get('products');
        } else {
            $products = Product::all();
            Cache::put('products', $products, now()->addDay(365));
        }

        if (Cache::has('shops')) {
            $shops = Cache::get('shops');
        } else {
            $shops = Shop::all();
            Cache::put('shops', $shops, now()->addDay(365));
        }

        if (Cache::has('freebies')) {
            $freebies = Cache::get('freebies');
        } else {
            $freebies = Free::all();
            Cache::put('freebies', $freebies, now()->addDay(365));
        }

        if (Cache::has('wheres')) {
            $wheres = Cache::get('wheres');
        } else {
            $wheres = Where::all();
            Cache::put('wheres', $wheres, now()->addDay(365));
        }

        // TODO: ROZWAŻYĆ PRZENIESIENIE CACHOWANIA DO MODELU

        return view(
            'form/application/index',
            [
                'voivodeships' => $voivodeships,
                'products' => $products,
                'shops' => $shops,
                'freebies' => $freebies,
                'wheres' => $wheres
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
