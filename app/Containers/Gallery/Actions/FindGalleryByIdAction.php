<?php

namespace App\Containers\Gallery\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class FindGalleryByIdAction
 * @package App\Containers\Gallery\Actions
 */
class FindGalleryByIdAction extends Action
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function run(Request $request)
    {
        $gallery = Apiato::call('Gallery@FindGalleryByIdTask', [$request->id], ['includes']);

        return $gallery;
    }
}
