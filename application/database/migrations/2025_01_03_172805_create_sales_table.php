<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();

            $table->string('g_number');
            
            $table->date('date');
            $table->date('last_change_date');

            $table->string('supplier_article');
            $table->string('tech_size');
            $table->string('barcode');

            $table->decimal('total_price', 15, 2);
            $table->integer('discount_percent');

            $table->boolean('is_supply');
            $table->boolean('is_realization');

            $table->decimal('promo_code_discount', 15, 2)->nullable();

            $table->string('warehouse_name');
            $table->string('country_name');
            $table->string('oblast_okrug_name');
            $table->string('region_name');

            $table->unsignedBigInteger('income_id');
            $table->string('sale_id');

            $table->unsignedBigInteger('odid')->nullable();
            $table->integer('spp');

            $table->decimal('for_pay', 15, 2);
            $table->decimal('finished_price', 15, 2);
            $table->decimal('price_with_disc', 15, 2);

            $table->uuid('nm_id');

            $table->string('subject');
            $table->string('category');
            $table->string('brand');

            $table->boolean('is_storno')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
