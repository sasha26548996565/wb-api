<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\Api\SaleController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\StockController;
use App\Http\Controllers\Api\IncomeController;

Route::middleware([AuthMiddleware::class])->group(function () {
    Route::get('sales', [SaleController::class, 'list']);
    Route::post('sales/store', [SaleController::class, 'store']);
    
    Route::get('stocks', [StockController::class, 'list']);
    Route::post('stocks/store', [StockController::class, 'store']);

    Route::get('orders', [OrderController::class, 'list']);
    Route::post('orders/store', [OrderController::class, 'store']);

    Route::get('incomes', [IncomeController::class, 'list']);
    Route::post('incomes/store', [IncomeController::class, 'store']);
});

