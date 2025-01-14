<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Token;
use App\Models\Account;
use App\Models\TokenType;
use Illuminate\Console\Command;

class AddTokenCommand extends Command
{
    protected $signature = 'add:token {account_id} {token_type_id} {token_value}';
    protected $description = 'add new token {account_id} - account id {token_type_id} - token type id.
        {token_value} - token value.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $account_id = $this->argument('account_id');
        $token_type_id = $this->argument('token_type_id');
        $token_value = $this->argument('token_value');

        $account = Account::find($account_id);
        
        if (! $account) {
            $this->error("account with ID {$account_id} not found");
            return self::FAILURE;
        }

        $tokenType = TokenType::find($token_type_id);

        if (! $tokenType) {
            $this->error("token type with ID {$token_type_id} not found");
            return self::FAILURE;
        }

        $token = Token::create([
            'account_id' => $account_id,
            'token_type_id' => $token_type_id,
            'token_value' => $token_value,
        ]);

        $this->info("token added for account {$account->name}");

        return self::SUCCESS;
    }
}
