<?php

declare(strict_types=1);

namespace App\Action\Stock;

use Exception;
use App\Models\Stock;
use App\Support\DTOs\StockDTO;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use App\Support\Contracts\Stock\StoreStockContract;

class StoreStockAction implements StoreStockContract
{
    public function __invoke(StockDTO $stockDTO): Stock
    {
        DB::beginTransaction();

        try {
            $stock = Stock::create([
                'supplier_article' => $stockDTO->supplier_article,
                'tech_size' => $stockDTO->tech_size,
                'barcode' => $stockDTO->barcode,
                'quantity' => $stockDTO->quantity,
                'is_supply' => $stockDTO->is_supply,
                'is_realization' => $stockDTO->is_realization,
                'quantity_full' => $stockDTO->quantity_full,
                'warehouse_name' => $stockDTO->warehouse_name,
                'in_way_to_client' => $stockDTO->in_way_to_client,
                'in_way_from_client' => $stockDTO->in_way_from_client,
                'nm_id' => $stockDTO->nm_id,
                'subject' => $stockDTO->subject,
                'category' => $stockDTO->category,
                'brand' => $stockDTO->brand,
                'sc_code' => $stockDTO->sc_code,
                'price' => $stockDTO->price,
                'discount' => $stockDTO->discount,
                'date' => $stockDTO->date,
                'last_change_date' => $stockDTO->last_change_date,
            ]);

            DB::commit();

            return $stock;
        } catch (Exception $exception) {
            DB::rollback();

            abort(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}