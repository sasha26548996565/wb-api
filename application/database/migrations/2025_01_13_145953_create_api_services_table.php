<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApiServicesTable extends Migration
{
    public function up()
    {
        Schema::create('api_services', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('api_services');
    }
}
