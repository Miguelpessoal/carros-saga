<?php

namespace Tests\Feature;

use App\Traits\RefreshTenantDatabase;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshTenantDatabase;

    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
