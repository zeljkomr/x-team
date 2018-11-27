<?php

namespace App\Containers\Portfolio\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class GetAllPortfoliosAction
 * @package App\Containers\Portfolio\Actions
 */
class GetAllPortfoliosAction extends Action
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function run(Request $request)
    {
        $portfolios = Apiato::call('Portfolio@GetAllPortfoliosTask', [], ['includes']);

        return $portfolios;
    }
}
