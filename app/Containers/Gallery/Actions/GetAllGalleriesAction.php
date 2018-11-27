<?php

namespace App\Containers\Gallery\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class GetAllGalleriesAction
 * @package App\Containers\Gallery\Actions
 */
class GetAllGalleriesAction extends Action
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function run(Request $request)
    {
        $galleries = Apiato::call('Gallery@GetAllGalleriesTask', [], ['includes']);

        return $galleries;
    }
}
