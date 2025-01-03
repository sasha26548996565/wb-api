<?php

namespace App\Providers;

use App\Action\Sale\StoreSaleAction;
use App\Action\Order\StoreOrderAction;
use App\Action\Stock\StoreStockAction;
use Illuminate\Support\ServiceProvider;
use App\Action\Income\StoreIncomeAction;
use App\Support\Contracts\Sale\StoreSaleContract;
use App\Support\Contracts\Order\StoreOrderContract;
use App\Support\Contracts\Stock\StoreStockContract;
use App\Support\Contracts\Income\StoreIncomeContract;

class ActionServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(StoreStockContract::class, StoreStockAction::class);
        $this->app->bind(StoreSaleContract::class, StoreSaleAction::class);
        $this->app->bind(StoreOrderContract::class, StoreOrderAction::class);
        $this->app->bind(StoreIncomeContract::class, StoreIncomeAction::class);
    }
}
