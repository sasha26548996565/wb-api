<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Filters\IncomeFilter;
use App\Support\DTOs\IncomeDTO;
use App\Services\ApiDataService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\IncomeRequest;
use App\Http\Resources\IncomesCollection;
use App\Support\Contracts\Income\StoreIncomeContract;

class IncomeController extends Controller
{
    public function __construct(
        private ApiDataService $apiDataService
    ) {}

    public function list(IncomeRequest $request) : IncomesCollection
    {
        return new IncomesCollection(
            IncomeFilter::searchByRequest($request)
                ->paginate($request->limit ?? 500));
    }

    public function store(Request $request, StoreIncomeContract $storeIncome): JsonResponse
    {
        $params = [
            'name' => 'incomes',
            'dateFrom' => '2020-01-03',
            'dateTo' => '2025-01-03'
        ];
        $incomes = $this->apiDataService->getData($params);

        foreach ($incomes as $income) {
            $storeIncome(IncomeDTO::collection(collect($income)));
        }

        return response()->json([
            'success' => true
        ]);
    }
}
