<?php

namespace App\Containers\Rate\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateRateAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            'rates'
        ]);

        $rate = Apiato::call('Rate@UpdateRateTask', [$request->id, $data]);

        return $rate;
    }
}
