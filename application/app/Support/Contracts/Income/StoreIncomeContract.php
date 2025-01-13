<?php

declare(strict_types=1);

namespace App\Support\Contracts\Income;

use App\Models\Income;
use App\Support\DTOs\IncomeDTO;

interface StoreIncomeContract
{
    public function __invoke(IncomeDTO $saleDTO): Income;
}
