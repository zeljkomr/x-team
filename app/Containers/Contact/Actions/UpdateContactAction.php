<?php

namespace App\Containers\Contact\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class UpdateContactAction
 * @package App\Containers\Contact\Actions
 */
class UpdateContactAction extends Action
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            'contact',
            'type'
        ]);

        $contact = Apiato::call('Contact@UpdateContactTask', [$request->id, $data]);

        return $contact;
    }
}
