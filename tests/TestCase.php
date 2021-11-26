<?php

namespace Tests;

use DatabaseTestingSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    protected $seed = true;

    protected $seeder = DatabaseTestingSeeder::class;

    protected $connectionsToTransact = ['sqlite'];

    protected function setUp(): void
    {
        parent::setUp();

        $uses = array_flip(class_uses_recursive(static::class));

        if (isset($uses[RefreshTenantDatabase::class])) {
            $this->initializeTenancy();
        }
    }

    protected function tearDown(): void
    {
        $uses = array_flip(class_uses_recursive(static::class));

        if (isset($uses[RefreshTenantDatabase::class])) {
            $this->cleanStorageDirectory();
        }

        parent::tearDown();
    }
}
