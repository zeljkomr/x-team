<?php

namespace App\Containers\Rate\Actions;

use App\Ship\Exceptions\UpdateProfileFieldException;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class CreateRateAction
 * @package App\Containers\Rate\Actions
 */
class CreateRateAction extends Action
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            'rates'
        ]);
        $data['user_id'] = auth()->user()->id;

        if (isset($request->currency)) {
            $data['currency'] = $request->currency;
            Apiato::call('User@UpdateCurrencyTask', [$data['currency']]);
        }

        $rate = Apiato::call('Rate@CreateRateTask', [$data]);

        return $rate;

    }
}
