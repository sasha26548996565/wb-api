<?php

declare(strict_types=1);

namespace App\Support\Contracts\Stock;

use App\Models\Stock;
use App\Support\DTOs\StockDTO;

interface StoreStockContract
{
    public function __invoke(StockDTO $stockDTO): Stock;
}
