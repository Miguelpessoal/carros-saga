<?php

namespace Tests\Feature;

use App\Models\Tenant;
use App\Traits\RefreshTenantDatabase;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshTenantDatabase;

    public function testExample()
    {
        $tenant = Tenant::find('foo');

        tenancy()->initialize($tenant);

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
