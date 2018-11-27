<?php

namespace App\Containers\Profile\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class FindProfileByIdAction
 * @package App\Containers\Profile\Actions
 */
class FindProfileByIdAction extends Action
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function run(Request $request)
    {
        $profile = Apiato::call('Profile@FindProfileByIdTask', [$request->id], ['includes']);

        return $profile;
    }
}
