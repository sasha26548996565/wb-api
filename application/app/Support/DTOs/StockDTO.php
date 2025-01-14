<?php

declare(strict_types=1);

namespace App\Support\DTOs;

use App\Traits\Makeable;
use Illuminate\Support\Collection;

final class StockDTO
{
    use Makeable;

    public function __construct(
        public readonly ?int $account_id,
        public readonly string $supplier_article,
        public readonly string $tech_size,
        public readonly int $barcode,
        public readonly int $quantity,
        public readonly bool $is_supply,
        public readonly bool $is_realization,
        public readonly int $quantity_full,
        public readonly string $warehouse_name,
        public readonly int $in_way_to_client,
        public readonly int $in_way_from_client,
        public readonly int $nm_id,
        public readonly string $subject,
        public readonly string $category,
        public readonly string $brand,
        public readonly int $sc_code,
        public readonly string $price,
        public readonly string $discount,
        public readonly string $date,
        public readonly string $last_change_date
    ) {}

    public static function collection(Collection $collection): StockDTO
    {
        return self::make(...$collection->only([
            'account_id',
            'supplier_article',
            'tech_size',
            'barcode',
            'quantity',
            'is_supply',
            'is_realization',
            'quantity_full',
            'warehouse_name',
            'in_way_to_client',
            'in_way_from_client',
            'nm_id',
            'subject',
            'category',
            'brand',
            'sc_code',
            'price',
            'discount',
            'date',
            'last_change_date'
        ]));
    }
}
