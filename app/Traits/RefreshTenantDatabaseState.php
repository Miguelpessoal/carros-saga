<?php

namespace App\Traits;

class RefreshTenantDatabaseState
{
    /**
     * Indicates if the test database has been migrated.
     *
     * @var bool
     */
    public static $migrated = false;
}
