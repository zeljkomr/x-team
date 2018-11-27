<?php

namespace App\Containers\Gallery\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;


/**
 * Class CreateGalleryAction
 * @package App\Containers\Gallery\Actions
 */
class CreateGalleryAction extends Action
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            'name',
            'description',
            'files',
        ]);
        $files = Apiato::call('File@CreateFileTask', [$data['files'], 'gallery']);
        $fileIDs = [];
        foreach ($files as $k => $file) {
            $fileIDs[$k] = $file->id;
        }
        $data['files'] = $fileIDs;

        $gallery = Apiato::call('Gallery@CreateGalleryTask', [$data], ['includes']);

        $data['gallery_id'] = $gallery->id;

        return $gallery;
    }
}
