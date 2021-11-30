<?php

namespace App\Console\Commands;

use App\Models\Tenant;
use Illuminate\Console\Command;

class TenantCommands extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:tenant';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tenant = Tenant::create([
            'id' => 'empresa2',
            'tenancy_db_name' => 'empresa2',
        ]);

        tenancy()->central(function () use ($tenant) {
            $tenant->domains()->create([
                'domain' => 'empresa2',
            ]);
        });
    }
}
