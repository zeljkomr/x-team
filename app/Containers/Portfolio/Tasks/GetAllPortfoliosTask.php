<?php

namespace App\Containers\Portfolio\Tasks;

use App\Containers\Portfolio\Data\Repositories\PortfolioRepository;
use App\Ship\Criterias\Eloquent\IncludesCriteria;
use App\Ship\Parents\Tasks\Task;

/**
 * Class GetAllPortfoliosTask
 * @package App\Containers\Portfolio\Tasks
 */
class GetAllPortfoliosTask extends Task
{

    /**
     * @var PortfolioRepository
     */
    protected $repository;

    /**
     * GetAllPortfoliosTask constructor.
     * @param PortfolioRepository $repository
     */
    public function __construct(PortfolioRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return mixed
     */
    public function run()
    {
        return $this->repository->findWhere(['user_id' => auth()->user()->id]);
    }

    /**
     * @return PortfolioRepository
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function includes()
    {
        return $this->repository->pushCriteria(new IncludesCriteria());
    }
}
