<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();

            $table->date('date');
            $table->date('last_change_date');

            $table->string('supplier_article');
            $table->string('tech_size');

            $table->bigInteger('barcode');
            $table->integer('quantity');

            $table->boolean('is_supply');
            $table->boolean('is_realization');

            $table->integer('quantity_full');
            $table->string('warehouse_name');

            $table->integer('in_way_to_client');
            $table->integer('in_way_from_client');

            $table->bigInteger('nm_id');

            $table->string('subject');
            $table->string('category');
            $table->string('brand');

            $table->bigInteger('sc_code');

            $table->decimal('price', 10, 2);
            $table->decimal('discount', 5, 2);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
