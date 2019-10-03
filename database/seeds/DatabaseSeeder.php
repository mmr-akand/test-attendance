<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(SentinelRoleSeeder::class);
        $this->call(SentinelAdminSeeder::class);
        
        $this->command->info('All seeder seeded!');

        Model::reguard();
    }
}
