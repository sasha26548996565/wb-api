<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApiService extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function tokenTypes(): HasMany
    {
        return $this->hasMany(TokenType::class, 'api_service_id', 'id');
    }
}
