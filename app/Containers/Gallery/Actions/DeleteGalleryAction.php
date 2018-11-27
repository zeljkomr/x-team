<?php

namespace App\Containers\Gallery\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class DeleteGalleryAction
 * @package App\Containers\Gallery\Actions
 */
class DeleteGalleryAction extends Action
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function run(Request $request)
    {
        return Apiato::call('Gallery@DeleteGalleryTask', [$request->id], ['includes']);
    }
}
