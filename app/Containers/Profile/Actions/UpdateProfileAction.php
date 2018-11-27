<?php

namespace App\Containers\Profile\Actions;

use App\Containers\Profile\UI\API\Requests\UpdateProfileRequest;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class UpdateProfileAction
 * @package App\Containers\Profile\Actions
 */
class UpdateProfileAction extends Action
{
    /**
     * @param UpdateProfileRequest $request
     * @return mixed
     */
    public function run(UpdateProfileRequest $request)
    {
        $data = $request->sanitizeInput([
            'description',
            'title',
        ]);

        $profile = Apiato::call('Profile@UpdateProfileTask', [$request->id, $data]);

        return $profile;
    }
}
