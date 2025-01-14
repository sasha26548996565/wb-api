<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Company;
use Illuminate\Console\Command;

class AddCompanyCommand extends Command
{
    protected $signature = 'add:company {name}';
    protected $description = 'add new company {name} - company name';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $name = $this->argument('name');
        $company = Company::create(['name' => $name]);

        $this->info("company {$company->name} added");

        return self::SUCCESS;
    }
}
