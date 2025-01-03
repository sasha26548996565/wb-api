<?php

declare(strict_types=1);

namespace App\Support\DTOs;

use App\Traits\Makeable;
use Illuminate\Support\Collection;

final class SaleDTO
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
        public readonly string $discount_percent,
        public readonly bool $is_supply,
        public readonly bool $is_realization,
        public readonly ?string $promo_code_discount,
        public readonly string $warehouse_name,
        public readonly string $country_name,
        public readonly string $oblast_okrug_name,
        public readonly string $region_name,
        public readonly int $income_id,
        public readonly string $sale_id,
        public readonly ?int $odid,
        public readonly string $spp,
        public readonly string $for_pay,
        public readonly string $finished_price,
        public readonly string $price_with_disc,
        public readonly int $nm_id,
        public readonly string $subject,
        public readonly string $category,
        public readonly string $brand,
        public readonly ?bool $is_storno
    ) {}

    public static function collection(Collection $collection): SaleDTO
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
            'is_supply',
            'is_realization',
            'promo_code_discount',
            'warehouse_name',
            'country_name',
            'oblast_okrug_name',
            'region_name',
            'income_id',
            'sale_id',
            'odid',
            'spp',
            'for_pay',
            'finished_price',
            'price_with_disc',
            'nm_id',
            'subject',
            'category',
            'brand',
            'is_storno'
        ]));
    }
}
