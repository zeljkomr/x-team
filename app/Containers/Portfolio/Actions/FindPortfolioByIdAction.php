<?php

namespace App\Containers\Portfolio\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class FindPortfolioByIdAction
 * @package App\Containers\Portfolio\Actions
 */
class FindPortfolioByIdAction extends Action
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function run(Request $request)
    {
        $portfolio = Apiato::call('Portfolio@FindPortfolioByIdTask', [$request->id]);

        return $portfolio;
    }
}
