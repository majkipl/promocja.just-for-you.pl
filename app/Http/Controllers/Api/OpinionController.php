<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndexOpinionApiRequest;
use App\Models\Opinion;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class OpinionController extends Controller
{
    public function index(IndexOpinionApiRequest $request): JsonResponse
    {
        $search = $request->input('search');
        $offset = $request->input('offset', 0);
        $limit = $request->input('limit', 10);
        $searchable = $request->input('searchable', []);
        $filter = $request->input('filter', []);

        $query = Opinion::with(['free'])->search($search, $searchable)->filter($filter);

        $opinionCount = $query->count('id');
        $opinions = $query->offset($offset)->limit($limit)->get();

        return response()->json([
            'total' => $opinionCount,
            'rows' => $opinions
        ], Response::HTTP_OK);
    }
}
