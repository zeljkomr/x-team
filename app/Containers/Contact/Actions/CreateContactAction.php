<?php

namespace App\Containers\Contact\Actions;

use App\Containers\Contact\UI\API\Requests\CreateContactRequest;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class CreateContactAction
 * @package App\Containers\Contact\Actions
 */
class CreateContactAction extends Action
{
    /**
     * @param CreateContactRequest $request
     * @return mixed
     */
    public function run(CreateContactRequest $request)
    {
        $data = $request->sanitizeInput([
            'contacts',
        ]);

        $contact = Apiato::call('Contact@CreateContactTask', [$data]);

        return $contact;
    }
}
