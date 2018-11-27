<?php

namespace App\Containers\File\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class CreateFileAction
 * @package App\Containers\File\Actions
 */
class CreateFileAction extends Action
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            'files',
        ]);

        $file = Apiato::call('File@CreateFileTask', [$data['files'], null]);

        return $file;
    }
}
