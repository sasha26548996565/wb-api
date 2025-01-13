<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Token extends Model
{
    use HasFactory;

    protected $fillable = ['account_id', 'token_type_id', 'token_value'];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }

    public function tokenType(): BelongsTo
    {
        return $this->belongsTo(TokenType::class, 'token_type_id', 'id');
    }
}
