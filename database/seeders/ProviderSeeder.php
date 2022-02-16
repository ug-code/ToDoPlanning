<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $provider = [
            [
                'name'     => 'ProviderOne',
                'endpoint' => 'http://www.mocky.io/v2/5d47f24c330000623fa3ebfa',
            ],
            [
                'name'     => 'ProviderTwo',
                'endpoint' => 'http://www.mocky.io/v2/5d47f235330000623fa3ebf7',
            ],


        ];

        DB::table('provider')
          ->insert($provider);
    }
}
