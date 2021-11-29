<?php

namespace App\Traits;

use App\Models\Tenant;
use Illuminate\Support\Str;
use Illuminate\Routing\UrlGenerator;
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
        $tenant = Tenant::create([
            'id' => 'tenant',
            'tenancy_db_name' => 'tenant.database.sqlite',
            'tenancy_create_database' => false,
        ]);

        $tenant->domains()->create([
            'domain' => 'tenant',
        ]);

        tenancy()->initialize($tenant);

        config(['app.url' => "http://tenant.localhost"]);

        /** @var UrlGenerator */
        $url = url();
        $url->forceRootUrl("http://tenant.localhost");

        $this->refreshTenantTestDatabase($tenant);
    }

    protected function cleanStorageDirectory(): void
    {
        $directories = File::directories(base_path('storage'));

        foreach ($directories as $directory) {
            if (Str::contains(substr($directory, strrpos($directory, '/') + 1, 11), 'tenancy')) {
                File::deleteDirectory($directory);
            }
        }
    }
}
