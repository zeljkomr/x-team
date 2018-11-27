<?php

namespace App\Containers\Authorization\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

/**
 * Class AuthorizationDefaultUsersSeeder_3
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class AuthorizationDefaultUsersSeeder_3 extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default Users (with their roles) ---------------------------------------------
        Apiato::call('User@CreateUserByCredentialsTask', [
            'Super Admin',
            'admin',
            'admin@admin.com',
            $isClient = false,
        ])->assignRole(Apiato::call('Authorization@FindRoleTask', ['admin']));

        Apiato::call('User@CreateUserByCredentialsTask', [
            'Test Customer',
            'testCustomer',
            'customer@example.com',
            $isClient = false,
        ])->assignRole(Apiato::call('Authorization@FindRoleTask', ['customer']));

        Apiato::call('User@CreateUserByCredentialsTask', [
            'Test Freelancer',
            'testFreelancer',
            'freelancer@example.com',
            $isClient = false,
        ])->assignRole(Apiato::call('Authorization@FindRoleTask', ['freelancer']));

        Apiato::call('User@CreateUserByCredentialsTask', [
            'Test Project Manager',
            'testProjectManager',
            'pm@example.com',
            $isClient = false,
        ])->assignRole(Apiato::call('Authorization@FindRoleTask', ['project-manager']));

        Apiato::call('User@CreateUserByCredentialsTask', [
            'Test CEO',
            'testCeo',
            'ceo@example.com',
            $isClient = false,
        ])->assignRole(Apiato::call('Authorization@FindRoleTask', ['ceo']));
        // ...

    }
}
