<?php

namespace App\Containers\Portfolio\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Notifications\Notification;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class CreatePortfolioAction
 * @package App\Containers\Portfolio\Actions
 */
class CreatePortfolioAction extends Action
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            'name',
            'url',
            'description',
            'scale',
            'files',
        ]);

        $location = sha1(auth()->user()->id);

        $files = Apiato::call('File@CreateFileTask', [$data['files'], $location]);

        $fileIDs = [];
        foreach ($files as $k => $file) {
            $fileIDs[$k] = $file->id;
        }
        $data['files'] = $fileIDs;

        $gallery = Apiato::call('Gallery@CreateGalleryTask', [$data], ['includes']);

        $data['gallery_id'] = $gallery->id;
        $data['user_id'] = auth()->user()->id;

        $portfolio = Apiato::call('Portfolio@CreatePortfolioTask', [$data], ['includes']);

        return $portfolio;
    }
}
