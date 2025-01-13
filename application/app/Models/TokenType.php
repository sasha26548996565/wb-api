<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TokenType extends Model
{
    use HasFactory;

    protected $fillable = ['api_service_id', 'name'];

    public function apiService(): BelongsTo
    {
        return $this->belongsTo(ApiService::class, 'api_service_id', 'id');
    }

    public function tokens(): HasMany
    {
        return $this->hasMany(Token::class, 'token_type_id', 'id');
    }
}
