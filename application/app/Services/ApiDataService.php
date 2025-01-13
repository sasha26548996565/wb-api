<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiDataService
{
    public function getData(array $params): array
    {
        $response = Http::get("http://89.108.115.241:6969/api/{$params['name']}", [
            'dateFrom' => $params['dateFrom'],
            'dateTo' => $params['dateTo'],
            'page' => 1,
            'key' => config('app.api_key'),
            'limit' => 100,
        ]);

        if ($response->successful()) {
            $data = $response->json();

            return $data['data'];
        }

        return [
            'success' => false
        ];
    }
}
