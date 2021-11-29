<?php

namespace Database\Seeds;

use App\Models\Tenant;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{

    public function run()
    {
        $tenant = Tenant::create([
            'id' => 'foo',
            'tenancy_db_name' => 'foo.sqlite',
            'tenancy_create_database' => false,
        ]);

        $tenant->domains()->create([
            'domain' => 'foo',
        ]);
    }
}
