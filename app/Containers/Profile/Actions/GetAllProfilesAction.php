<?php

namespace App\Containers\Profile\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class GetAllProfilesAction
 * @package App\Containers\Profile\Actions
 */
class GetAllProfilesAction extends Action
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function run(Request $request)
    {
        $profiles = Apiato::call('Profile@GetAllProfilesTask', [], ['includes']);

        return $profiles;
    }
}
