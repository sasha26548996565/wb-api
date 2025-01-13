<?php

use App\Models\Account;
use App\Models\TokenType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTokensTable extends Migration
{
    public function up()
    {
        Schema::create('tokens', function (Blueprint $table) {
            $table->id();

            $table->text('token_value');

            $table->foreignIdFor(Account::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignIdFor(TokenType::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tokens');
    }
}
