<?php

namespace App\Containers\File\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class UpdateFileAction
 * @package App\Containers\File\Actions
 */
class UpdateFileAction extends Action
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            'description'
        ]);

        $file = Apiato::call('File@UpdateFileTask', [$request->id, $data]);

        return $file;
    }
}
