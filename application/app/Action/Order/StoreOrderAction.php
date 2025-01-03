<?php

declare(strict_types=1);

namespace App\Action\Order;

use Exception;
use App\Models\Order;
use App\Support\DTOs\OrderDTO;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use App\Support\Contracts\Order\StoreOrderContract;

class StoreOrderAction implements StoreOrderContract
{
    public function __invoke(OrderDTO $orderDTO): Order
    {
        DB::beginTransaction();

        try {
            $order = Order::create([
                'g_number' => $orderDTO->g_number,
                'date' => $orderDTO->date,
                'last_change_date' => $orderDTO->last_change_date,
                'supplier_article' => $orderDTO->supplier_article,
                'tech_size' => $orderDTO->tech_size,
                'barcode' => $orderDTO->barcode,
                'total_price' => $orderDTO->total_price,
                'discount_percent' => $orderDTO->discount_percent,
                'warehouse_name' => $orderDTO->warehouse_name,
                'oblast' => $orderDTO->oblast,
                'income_id' => $orderDTO->income_id,
                'odid' => $orderDTO->odid,
                'nm_id' => $orderDTO->nm_id,
                'subject' => $orderDTO->subject,
                'category' => $orderDTO->category,
                'brand' => $orderDTO->brand,
                'is_cancel' => $orderDTO->is_cancel,
                'cancel_dt' => $orderDTO->cancel_dt,
            ]);

            DB::commit();

            return $order;
        } catch (Exception $exception) {
            DB::rollback();

            abort(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
