<?php

namespace App\Traits;

use App\Models\Tenant;
use Illuminate\Support\Facades\File;

trait RefreshTenantDatabase
{
    public function beginDatabaseTransactionTenant()
    {
        $database = $this->app->make('db');

        $connection = $database->connection('tenant');
        $dispatcher = $connection->getEventDispatcher();

        $connection->unsetEventDispatcher();
        $connection->beginTransaction();
        $connection->setEventDispatcher($dispatcher);

        $this->beforeApplicationDestroyed(function () use ($database) {
            $connection = $database->connection('tenant');
            $dispatcher = $connection->getEventDispatcher();

            $connection->unsetEventDispatcher();
            $connection->rollback();
            $connection->setEventDispatcher($dispatcher);
            $connection->disconnect();
        });
    }

    public function refreshTenantTestDatabase(Tenant $tenant)
    {
        if (!RefreshTenantDatabaseState::$migrated) {
            $this->artisan("tenants:migrate-fresh --tenants={$tenant->id}");

            RefreshTenantDatabaseState::$migrated = true;
        }

        $this->beginDatabaseTransactionTenant();
    }

    public function initializeTenancy()
    {
        $tenant = Tenant::first();

        tenancy()->initialize($tenant);

        $this->refreshTenantTestDatabase($tenant);
    }

    protected function cleanStorageDirectory(): void
    {
        $directories = File::directories(base_path('storage'));

        foreach ($directories as $directory) {
            if (strcontains(substr($directory, strrpos($directory, '/') + 1, 11), 'tenancy')) {
                File::deleteDirectory($directory);
            }
        }
    }
}
