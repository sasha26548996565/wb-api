<?php

declare(strict_types=1);

namespace App\Services;

use Exception;
use App\Models\Sale;
use App\Models\Order;
use App\Models\Stock;
use App\Models\Income;
use Illuminate\Support\Facades\Log;

class UpdateDataService extends ApiDataService
{
    protected $modelMap = [
        'incomes' => Income::class,
        'orders' => Order::class,
        'stocks' => Stock::class,
        'sales' => Sale::class,
    ];

    public function updateData(array $params): array
    {
        $response = [
            'success' => [],
            'errors' => [],
        ];

        try {
            $data = $this->getData($params);

            if (!array_key_exists($params['name'], $this->modelMap)) {
                throw new Exception("Model {$params['name']} does not exist.");
            }

            $model = $this->modelMap[$params['name']];

            foreach ($data as $item) {
                if ($item) {
                    try {
                        $record = $model::create($item);
                        $response['success'][] = $record;
                    } catch (Exception $e) {
                        $response['errors'][] = $e->getMessage();
                    }
                }
            }
        } catch (Exception $e) {
            $response['errors'][] = $e->getMessage();
        }

        return $response;
    }

}
