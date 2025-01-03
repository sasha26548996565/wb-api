<?php

declare(strict_types=1);

namespace App\Support\Contracts\Sale;

use App\Models\Sale;
use App\Support\DTOs\SaleDTO;

interface StoreSaleContract
{
    public function __invoke(SaleDTO $saleDTO): Sale;
}
