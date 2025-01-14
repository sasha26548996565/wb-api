<?php

declare(strict_types=1);

namespace App\Action\Sale;

use Exception;
use App\Models\Sale;
use App\Support\DTOs\SaleDTO;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use App\Support\Contracts\Sale\StoreSaleContract;

class StoreSaleAction implements StoreSaleContract
{
    public function __invoke(SaleDTO $saleDTO): Sale
    {
        DB::beginTransaction();

        try {
            $sale = Sale::create([
                'account_id' => $saleDTO->account_id,
                'g_number' => $saleDTO->g_number,
                'date' => $saleDTO->date,
                'last_change_date' => $saleDTO->last_change_date,
                'supplier_article' => $saleDTO->supplier_article,
                'tech_size' => $saleDTO->tech_size,
                'barcode' => $saleDTO->barcode,
                'total_price' => $saleDTO->total_price,
                'discount_percent' => $saleDTO->discount_percent,
                'is_supply' => $saleDTO->is_supply,
                'is_realization' => $saleDTO->is_realization,
                'promo_code_discount' => $saleDTO->promo_code_discount,
                'warehouse_name' => $saleDTO->warehouse_name,
                'country_name' => $saleDTO->country_name,
                'oblast_okrug_name' => $saleDTO->oblast_okrug_name,
                'region_name' => $saleDTO->region_name,
                'income_id' => $saleDTO->income_id,
                'sale_id' => $saleDTO->sale_id,
                'odid' => $saleDTO->odid,
                'spp' => $saleDTO->spp,
                'for_pay' => $saleDTO->for_pay,
                'finished_price' => $saleDTO->finished_price,
                'price_with_disc' => $saleDTO->price_with_disc,
                'nm_id' => $saleDTO->nm_id,
                'subject' => $saleDTO->subject,
                'category' => $saleDTO->category,
                'brand' => $saleDTO->brand,
                'is_storno' => $saleDTO->is_storno,
            ]);

            DB::commit();

            return $sale;
        } catch (Exception $exception) {
            DB::rollback();

            abort(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
