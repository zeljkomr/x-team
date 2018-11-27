<?php

namespace App\Containers\Portfolio\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class UpdatePortfolioAction
 * @package App\Containers\Portfolio\Actions
 */
class UpdatePortfolioAction extends Action
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            'name',
            'description',
            'scale',
            'url',
        ]);

        $portfolio = Apiato::call('Portfolio@UpdatePortfolioTask', [$request->id, $data]);

        return $portfolio;
    }
}
