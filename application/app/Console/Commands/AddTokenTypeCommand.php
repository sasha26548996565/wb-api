<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\TokenType;
use App\Models\ApiService;
use Illuminate\Console\Command;

class AddTokenTypeCommand extends Command
{
    protected $signature = 'add:token-type {api_service_id} {name}';
    protected $description = 'add new token type {api_service_id} - api service id {name} - token type name';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $api_service_id = $this->argument('api_service_id');
        $name = $this->argument('name');

        $apiService = ApiService::find($api_service_id);
        
        if (! $apiService) {
            $this->error("api service with id {$api_service_id} not found");
            return self::FAILURE;
        }

        $tokenType = TokenType::create([
            'api_service_id' => $api_service_id,
            'name' => $name
        ]);

        $this->info("token type {$tokenType->name} added for api service {$apiService->name}");

        return self::SUCCESS;
    }
}
