<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomesTable extends Migration
{
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();

            $table->string('income_id');
            $table->string('number')->nullable();
            
            $table->timestamp('date');
            $table->timestamp('last_change_date');

            $table->string('supplier_article');
            $table->string('tech_size');
            $table->string('barcode');

            $table->integer('quantity');

            $table->string('total_price');

            $table->timestamp('date_close');

            $table->string('warehouse_name');
            $table->string('nm_id');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('incomes');
    }
}
