<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\ApiService;
use Illuminate\Console\Command;

class AddApiServiceCommand extends Command
{
    protected $signature = 'add:api-service {name}';
    protected $description = 'add new API service {name} - api service name';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $name = $this->argument('name');
        $apiService = ApiService::create(['name' => $name]);

        $this->info("api service {$apiService->name} added");

        return self::SUCCESS;
    }
}
