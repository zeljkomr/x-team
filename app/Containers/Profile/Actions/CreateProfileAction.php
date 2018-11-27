<?php

namespace App\Containers\Profile\Actions;

use App\Containers\Profile\UI\API\Requests\CreateProfileRequest;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class CreateProfileAction
 * @package App\Containers\Profile\Actions
 */
class CreateProfileAction extends Action
{
    /**
     * @param CreateProfileRequest $request
     * @return mixed
     */
    public function run(CreateProfileRequest $request)
    {
        $data = $request->sanitizeInput([
            'description',
            'title'
        ]);
        $data['user_id'] = auth()->user()->id;
        $profile = Apiato::call('Profile@CreateProfileTask', [$data], ['includes']);

        return $profile;
    }
}
