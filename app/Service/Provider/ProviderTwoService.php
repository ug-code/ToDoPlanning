<?php

namespace App\Service\Provider;

use App\Models\Provider;
use App\Models\Todo;
use App\Service\Provider\Contracts\ProviderServiceInterface;
use Illuminate\Support\facades\http;

class ProviderTwoService implements ProviderServiceInterface
{

    public function checkTodoList()
    {

        /** @var Provider $provider */
        $provider = Provider::where('name', 'ProviderTwo')
                            ->firstOrFail();

        $list = http::get($provider->endpoint)
                    ->json();


        foreach ($list as  $data) {
            $key = key($data);

            (new Todo)->firstOrCreate([
                'provider_id'        => $provider->id ?? null,
                'name'               => $key,
                'level'              => $data[$key]['level'] ?? null,
                'estimated_duration' => $data[$key]['estimated_duration'] ?? null,
            ]);
        }


    }
}
