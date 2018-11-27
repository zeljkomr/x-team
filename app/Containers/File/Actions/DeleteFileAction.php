<?php

namespace App\Containers\File\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class DeleteFileAction
 * @package App\Containers\File\Actions
 */
class DeleteFileAction extends Action
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            'files',
            'gallery_id'
        ]);

        return Apiato::call('Gallery@DetachFileFromGalleryTask', [$data]);
    }
}
