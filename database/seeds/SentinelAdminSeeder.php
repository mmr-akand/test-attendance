<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SentinelAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private function seedAdmin()
    {
        $email = 'admin@test.com';
        $admin_check = DB::table('users')->where('email', $email)->first();

        if(!is_null($admin_check))
            return false;

        $adminUser = Sentinel::registerAndActivate([
            'id' => '1',
            'email'    => $email,
            'password' => 'admin',
            'name' => 'Admin',
            'phone' => '01*********',
            'status' => 'active',
            'photo' => 'images/avater.png'
        ]);

        $adminRole = Sentinel::findRoleBySlug('admin');
        $adminRole->users()->attach($adminUser);

        $this->command->info('Admin User seeded!');
    }

    public function run()
    {
        $this->seedAdmin();
    }
}
