<?php

namespace App\Containers\File\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class FindFileByIdAction
 * @package App\Containers\File\Actions
 */
class FindFileByIdAction extends Action
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function run(Request $request)
    {
        $file = Apiato::call('File@FindFileByIdTask', [$request->id]);

        return $file;
    }
}
