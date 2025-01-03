<?php

declare(strict_types=1);

namespace App\Support\DTOs;

use App\Traits\Makeable;
use Illuminate\Support\Collection;

final class OrderDTO
{
    use Makeable;

    public function __construct(
        public readonly string $g_number,
        public readonly string $date,
        public readonly string $last_change_date,
        public readonly string $supplier_article,
        public readonly string $tech_size,
        public readonly int $barcode,
        public readonly string $total_price,
        public readonly int $discount_percent,
        public readonly string $warehouse_name,
        public readonly string $oblast,
        public readonly int $income_id,
        public readonly string $odid,
        public readonly int $nm_id,
        public readonly string $subject,
        public readonly string $category,
        public readonly string $brand,
        public readonly bool $is_cancel,
        public readonly ?string $cancel_dt
    ) {}

    public static function collection(Collection $collection): OrderDTO
    {
        return self::make(...$collection->only([
            'g_number',
            'date',
            'last_change_date',
            'supplier_article',
            'tech_size',
            'barcode',
            'total_price',
            'discount_percent',
            'warehouse_name',
            'oblast',
            'income_id',
            'odid',
            'nm_id',
            'subject',
            'category',
            'brand',
            'is_cancel',
            'cancel_dt'
        ]));
    }
}
