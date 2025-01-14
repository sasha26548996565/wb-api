<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Account;
use App\Models\Company;
use Illuminate\Console\Command;

class AddAccountCommand extends Command
{
    protected $signature = 'add:account {company_id} {name}';
    protected $description = 'add new account {company_id} - company Id {name} - account name';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $company_id = $this->argument('company_id');
        $name = $this->argument('name');

        $company = Company::find($company_id);

        if (! $company) {
            $this->error("company with ID {$company_id} not found");
            return self::FAILURE;
        }

        $account = Account::create([
            'company_id' => $company_id,
            'name' => $name
        ]);

        $this->info("account {$account->name} added to company {$company->name}");

        return self::SUCCESS;
    }
}
