<?php

namespace App\Containers\Portfolio\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class DeletePortfolioAction
 * @package App\Containers\Portfolio\Actions
 */
class DeletePortfolioAction extends Action
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function run(Request $request)
    {
        return Apiato::call('Portfolio@DeletePortfolioTask', [$request->id]);
    }
}
