<?php

use App\Models\Tenant;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{

    public function run()
    {
        Tenant::create([
            'id' => 'foo',
            'name' => 'FOO',
            'tenancy_db_name' => 'foo',
        ]);
    }
}
