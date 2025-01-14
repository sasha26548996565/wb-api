<?php

use App\Models\Account;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnForAccountIdToTables extends Migration
{
    private array $tables = ['sales', 'orders', 'stocks', 'incomes'];

    public function up(): void
    {
        foreach ($this->tables as $table) {
            Schema::table($table, callback: function (Blueprint $table) {
                $table->foreignIdFor(Account::class)
                    ->nullable()
                    ->constrained()
                    ->cascadeOnDelete();
            });
        }
    }

    public function down(): void
    {
        foreach ($this->tables as $table) {
            Schema::table($table, callback: function (Blueprint $table) {
                $table->dropConstrainedForeignId('account_id');
            });
        }
    }
}
