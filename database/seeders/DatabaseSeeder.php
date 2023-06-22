<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        if (tenant()) {

            \App\Models\User::factory()->create([
                 'name' => 'Test User',
                'email' => 'test@example.com',
            ]);

        } else {
            // Seeder da Central de Tenants

            /** @var Tenant $tenant */

            $tenant = Tenant::query()->create(['id' => 'a']);
            $tenant->domains()->create(['domain' => 'a.laravel-multi-tenant.test']);

            /** @var Tenant $tenant */

            $tenant = Tenant::query()->create(['id' => 'b']);
            $tenant->domains()->create(['domain' => 'b.laravel-multi-tenant.test']);
        }
    }
}
