<?php

declare(strict_types=1);

namespace App\Support\DTOs;

use App\Traits\Makeable;
use Illuminate\Support\Collection;

final class IncomeDTO
{
    use Makeable;

    public function __construct(
        public readonly ?int $account_id,
        public readonly int $income_id,
        public readonly string $number,
        public readonly string $date,
        public readonly string $last_change_date,
        public readonly string $supplier_article,
        public readonly string $tech_size,
        public readonly int $barcode,
        public readonly int $quantity,
        public readonly string $total_price,
        public readonly string $date_close,
        public readonly string $warehouse_name,
        public readonly int $nm_id
    ) {}

    public static function collection(Collection $collection): IncomeDTO
    {
        return self::make(...$collection->only([
            'account_id',
            'income_id',
            'number',
            'date',
            'last_change_date',
            'supplier_article',
            'tech_size',
            'barcode',
            'quantity',
            'total_price',
            'date_close',
            'warehouse_name',
            'nm_id'
        ]));
    }
}
