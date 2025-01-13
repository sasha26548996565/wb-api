<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\UpdateDataService;

class UpdateDataCommand extends Command
{
    protected $signature = 'update:data';

    protected $description = 'Updating data twice a day';

    private array $params;

    public function __construct(
        private UpdateDataService $updateDataService
    )
    {
        parent::__construct();

        $this->params = [
            [
                'name' => 'incomes',
                'dateFrom' => now()->subDay()->startOfDay()->format('Y-m-d H:i:s'),
                'dateTo' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'stocks',
                'dateFrom' => now()->subHours(12)->format('Y-m-d H:i:s'),
                'dateTo' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'sales',
                'dateFrom' => now()->subDay()->startOfDay()->format('Y-m-d H:i:s'),
                'dateTo' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'orders',
                'dateFrom' => now()->subDay()->startOfDay()->format('Y-m-d H:i:s'),
                'dateTo' => now()->format('Y-m-d H:i:s'),
            ],
        ];
    }

    public function handle(): int
    {
        foreach ($this->params as $item) {
            try {
                $this->info("Processing: {$item['name']}");
                $result = $this->updateDataService->updateData($item);

                foreach ($result['success'] as $record) {
                    $this->info("Successfully processed record: " . json_encode($record));
                }

                foreach ($result['errors'] as $error) {
                    $this->error("Error processing record: " . $error['message']);
                }
            } catch (\Exception $e) {
                $this->error("Failed to process {$item['name']}: " . $e->getMessage());
            }
        }

        return self::SUCCESS;
    }
}
