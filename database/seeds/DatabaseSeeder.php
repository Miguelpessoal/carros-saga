<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        return $this->call(DocumentSeeder::class);
    }
}
