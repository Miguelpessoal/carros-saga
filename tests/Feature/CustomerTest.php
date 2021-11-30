<?php

namespace Tests\Feature;

use App\Traits\RefreshTenantDatabase;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshTenantDatabase;

    public function test_only_logged_in_users_can_see_customers_list()
    {
        $this->get('/customers')
            ->assertRedirect('/login');
    }

    public function test_only_logged_in_users_can_see_cars_list()
    {
        $this->get('/cars')
            ->assertRedirect('/login');
    }
}
