<?php

namespace App\Containers\Contact\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class GetAllContactsAction
 * @package App\Containers\Contact\Actions
 */
class GetAllContactsAction extends Action
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function run(Request $request)
    {
        $contacts = Apiato::call('Contact@GetAllContactsTask', [], ['addRequestCriteria']);

        return $contacts;
    }
}
