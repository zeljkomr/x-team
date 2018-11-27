<?php

namespace App\Containers\Portfolio\UI\API\Controllers;

use App\Containers\Portfolio\UI\API\Requests\CreatePortfolioRequest;
use App\Containers\Portfolio\UI\API\Requests\DeletePortfolioRequest;
use App\Containers\Portfolio\UI\API\Requests\GetAllPortfoliosRequest;
use App\Containers\Portfolio\UI\API\Requests\FindPortfolioByIdRequest;
use App\Containers\Portfolio\UI\API\Requests\UpdatePortfolioRequest;
use App\Containers\Portfolio\UI\API\Transformers\PortfolioTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Portfolio\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreatePortfolioRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createPortfolio(CreatePortfolioRequest $request)
    {
        $portfolio = Apiato::call('Portfolio@CreatePortfolioAction', [$request]);

        return $this->created($this->transform($portfolio, PortfolioTransformer::class));
    }

    /**
     * @param FindPortfolioByIdRequest $request
     * @return array
     */
    public function findPortfolioById(FindPortfolioByIdRequest $request)
    {
        $portfolio = Apiato::call('Portfolio@FindPortfolioByIdAction', [$request]);

        return $this->transform($portfolio, PortfolioTransformer::class);
    }

    /**
     * @param GetAllPortfoliosRequest $request
     * @return array
     */
    public function getAllPortfolios(GetAllPortfoliosRequest $request)
    {
        $portfolios = Apiato::call('Portfolio@GetAllPortfoliosAction', [$request]);

        return $this->transform($portfolios, PortfolioTransformer::class);
    }

    /**
     * @param UpdatePortfolioRequest $request
     * @return array
     */
    public function updatePortfolio(UpdatePortfolioRequest $request)
    {
        $portfolio = Apiato::call('Portfolio@UpdatePortfolioAction', [$request]);

        return $this->transform($portfolio, PortfolioTransformer::class);
    }

    /**
     * @param DeletePortfolioRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deletePortfolio(DeletePortfolioRequest $request)
    {
        Apiato::call('Portfolio@DeletePortfolioAction', [$request]);

        return $this->noContent();
    }
}
