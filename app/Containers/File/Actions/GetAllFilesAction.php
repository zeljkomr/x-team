<?php

namespace App\Containers\File\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class GetAllFilesAction
 * @package App\Containers\File\Actions
 */
class GetAllFilesAction extends Action
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function run(Request $request)
    {
        $files = Apiato::call('File@GetAllFilesTask', [], ['addRequestCriteria']);

        return $files;
    }
}
