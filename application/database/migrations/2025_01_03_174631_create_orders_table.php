<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('g_number');

            $table->timestamp('date');

            $table->date('last_change_date');

            $table->string('supplier_article');
            $table->string('tech_size');

            $table->bigInteger('barcode');
            $table->decimal('total_price', 10, 2);
            $table->integer('discount_percent');

            $table->string('warehouse_name');
            $table->string('oblast');

            $table->bigInteger('income_id');
            $table->bigInteger('odid');
            $table->bigInteger('nm_id');

            $table->string('subject');
            $table->string('category');
            $table->string('brand');

            $table->boolean('is_cancel');

            $table->timestamp('cancel_dt')->nullable();
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
