<?php

declare(strict_types=1);

namespace App\Support\Contracts\Order;

use App\Models\Order;
use App\Support\DTOs\OrderDTO;

interface StoreOrderContract
{
    public function __invoke(OrderDTO $saleDTO): Order;
}
