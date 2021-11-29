<?php

namespace Database\Seeds;

use Illuminate\Database\Seeder;

class DatabaseTestingSeeder extends Seeder
{
    public function run()
    {
        return $this->call([TenantSeeder::class]);
    }
}
