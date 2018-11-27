<?php

namespace App\Containers\Authorization\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

/**
 * Class AuthorizationRolesSeeder_2
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class AuthorizationRolesSeeder_2 extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default Roles ----------------------------------------------------------------
        Apiato::call('Authorization@CreateRoleTask', ['admin', 'Administrator', 'Administrator Role', 999]);
        Apiato::call('Authorization@CreateRoleTask', ['freelancer', 'Freelancer', 'Freelancer Role', 100]);
        Apiato::call('Authorization@CreateRoleTask', ['project-manager', 'Project Manager', 'PM Role', 200]);
        Apiato::call('Authorization@CreateRoleTask', ['customer', 'Project Manager', 'PM Role', 300]);
        Apiato::call('Authorization@CreateRoleTask', ['ceo', 'CEO', 'CEO Role', 999]);

        // ...

    }
}