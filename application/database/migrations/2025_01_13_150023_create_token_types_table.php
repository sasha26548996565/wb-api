<?php

use App\Models\ApiService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTokenTypesTable extends Migration
{
    public function up()
    {
        Schema::create('token_types', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->foreignIdFor(ApiService::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('token_types');
    }
}
