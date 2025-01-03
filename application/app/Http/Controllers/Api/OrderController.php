<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Filters\OrderFilter;
use Illuminate\Http\Request;
use App\Support\DTOs\OrderDTO;
use App\Services\ApiDataService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrdersCollection;
use App\Support\Contracts\Order\StoreOrderContract;

class OrderController extends Controller
{
    public function __construct(
        private ApiDataService $apiDataService
    ) {}
    
    public function list(OrderRequest $request) : OrdersCollection
    {
        return new OrdersCollection(OrderFilter::searchByRequest($request)
            ->paginate($request->limit ?? 500)
        );
    }

    public function store(Request $request, StoreOrderContract $storeOrder): JsonResponse
    {
        $params = [
            'name' => 'orders',
            'dateFrom' => '2020-01-03',
            'dateTo' => '2025-01-03'
        ];
        $orders = $this->apiDataService->getData($params);

        foreach ($orders as $order) {
            $storeOrder(OrderDTO::collection(collect($order)));
        }

        return response()->json([
            'success' => true
        ]);
    }
}
