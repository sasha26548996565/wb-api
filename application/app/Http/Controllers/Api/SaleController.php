<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Filters\SaleFilter;
use Illuminate\Http\Request;
use App\Support\DTOs\SaleDTO;
use App\Services\ApiDataService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\SaleRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\SalesCollection;
use App\Support\Contracts\Sale\StoreSaleContract;

class SaleController extends Controller
{
    public function __construct(
        private ApiDataService $apiDataService
    ) {}

    public function list(SaleRequest $request) : SalesCollection
    {
        return new SalesCollection(SaleFilter::searchByRequest($request)
            ->paginate($request->limit ?? 500));
    }

    public function store(Request $request, StoreSaleContract $storeSale): JsonResponse
    {
        $params = [
            'name' => 'sales',
            'dateFrom' => '2025-01-03',
            'dateTo' => ''
        ];
        $sales = $this->apiDataService->getData($params);

        foreach ($sales as $sale) {
            $storeSale(SaleDTO::collection(collect($sale)));
        }

        return response()->json([
            'success' => true
        ]);
    }
}
