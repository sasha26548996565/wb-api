<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Models\Account;
use App\Filters\StockFilter;
use Illuminate\Http\Request;
use App\Support\DTOs\StockDTO;
use App\Services\ApiDataService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StockRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\StocksCollection;
use App\Support\Contracts\Stock\StoreStockContract;

class StockController extends Controller
{
    public function __construct(
        private ApiDataService $apiDataService
    ) {}

    public function list(StockRequest $request): StocksCollection
    {
        return new StocksCollection(
            StockFilter::searchByRequest($request)
                ->paginate($request->limit ?? 500)
        );
    }

    public function store(Request $request, StoreStockContract $storeStock): JsonResponse
    {
        $params = [
            'name' => 'stocks',
            'dateFrom' => '2025-01-03',
            'dateTo' => ''
        ];
        $stocks = $this->apiDataService->getData($params);
        $account = Account::find(1);

        foreach ($stocks as $stock) {
            $stock['account_id'] = $account?->id;
            $storeStock(StockDTO::collection(collect($stock)));
        }

        return response()->json([
            'success' => true
        ]);
    }
}
