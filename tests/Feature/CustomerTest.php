<?php

namespace Tests\Feature;

use App\Traits\RefreshTenantDatabase;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshTenantDatabase;
    /**
     * A basic unit test example.
     *
     * @test
     */
    public function only_logged_in_users_can_see_customers_list()
    {
        $this->get('/customers')
            ->assertRedirect('/login');
    }

    public function only_logged_in_users_can_see_cars_list()
    {
        $this->get('/cars')
            ->assertRedirect('/login');
    }
}
