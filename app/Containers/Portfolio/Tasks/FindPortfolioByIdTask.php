<?php

namespace App\Containers\Portfolio\Tasks;

use App\Containers\Portfolio\Data\Repositories\PortfolioRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

/**
 * Class FindPortfolioByIdTask
 * @package App\Containers\Portfolio\Tasks
 */
class FindPortfolioByIdTask extends Task
{

    /**
     * @var PortfolioRepository
     */
    protected $repository;

    /**
     * FindPortfolioByIdTask constructor.
     * @param PortfolioRepository $repository
     */
    public function __construct(PortfolioRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function run($id)
    {
        try {
            return $this->repository->find($id);
        } catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
