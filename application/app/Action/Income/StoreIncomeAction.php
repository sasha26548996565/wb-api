<?php

declare(strict_types=1);

namespace App\Action\Income;

use Exception;
use App\Models\Income;
use App\Support\DTOs\IncomeDTO;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use App\Support\Contracts\Income\StoreIncomeContract;

class StoreIncomeAction implements StoreIncomeContract
{
    public function __invoke(IncomeDTO $incomeDTO): Income
    {
        DB::beginTransaction();

        try {
            $income = Income::create([
                'income_id' => $incomeDTO->income_id,
                'number' => $incomeDTO->number,
                'date' => $incomeDTO->date,
                'last_change_date' => $incomeDTO->last_change_date,
                'supplier_article' => $incomeDTO->supplier_article,
                'tech_size' => $incomeDTO->tech_size,
                'barcode' => $incomeDTO->barcode,
                'quantity' => $incomeDTO->quantity,
                'total_price' => $incomeDTO->total_price,
                'date_close' => $incomeDTO->date_close,
                'warehouse_name' => $incomeDTO->warehouse_name,
                'nm_id' => $incomeDTO->nm_id,
            ]);

            DB::commit();

            return $income;
        } catch (Exception $exception) {
            DB::rollback();

            abort(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
