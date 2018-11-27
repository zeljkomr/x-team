<?php

namespace App\Containers\Contact\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class FindContactByIdAction
 * @package App\Containers\Contact\Actions
 */
class FindContactByIdAction extends Action
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function run(Request $request)
    {
        $contact = Apiato::call('Contact@FindContactByIdTask', [$request->id]);

        return $contact;
    }
}
