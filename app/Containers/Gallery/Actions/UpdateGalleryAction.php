<?php

namespace App\Containers\Gallery\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class UpdateGalleryAction
 * @package App\Containers\Gallery\Actions
 */
class UpdateGalleryAction extends Action
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
            'gallery_id'
        ]);

        $location = sha1(auth()->user()->id);

        $files = Apiato::call('File@CreateFileTask', [$data['files'], $location]);
        $fileIDs = [];
        foreach ($files as $k => $file) {
            $fileIDs[$k] = $file->id;
        }
        $data['files'] = $fileIDs;

        $gallery = Apiato::call('Gallery@UpdateGalleryTask', [$data], ['includes']);

        return $gallery;
    }
}
