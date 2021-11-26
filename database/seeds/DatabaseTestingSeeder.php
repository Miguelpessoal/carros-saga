<?php

use Illuminate\Database\Seeder;

class DatabaseTestingSeeder extends Seeder
{
    public function run()
    {
        return $this->call([DocumentSeeder::class, TenantSeeder::class]);
    }
}
