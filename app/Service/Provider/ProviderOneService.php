<?php

namespace App\Service\Provider;

use App\Models\Provider;
use App\Models\Todo;
use App\Service\Provider\Contracts\ProviderServiceInterface;
use Illuminate\Support\facades\http;

class ProviderOneService implements ProviderServiceInterface
{

    public function checkTodoList()
    {
        /** @var Provider $provider */
        $provider = Provider::where('name', 'ProviderOne')
                            ->firstOrFail();

        $list = http::get($provider->endpoint)
                    ->json();

        foreach ($list as $data) {
            (new Todo)->firstOrCreate([
                'provider_id'        => $provider->id ?? null,
                'name'               => $data['id'] ?? null,
                'level'              => $data['zorluk'] ?? null,
                'estimated_duration' => $data['sure'] ?? null,
            ]);
        }


    }
}
