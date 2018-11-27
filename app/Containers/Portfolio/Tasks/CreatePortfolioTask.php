<?php

namespace App\Containers\Portfolio\Tasks;

use App\Containers\Portfolio\Data\Repositories\PortfolioRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

/**
 * Class CreatePortfolioTask
 * @package App\Containers\Portfolio\Tasks
 */
class CreatePortfolioTask extends Task
{

    /**
     * @var PortfolioRepository
     */
    protected $repository;

    /**
     * CreatePortfolioTask constructor.
     * @param PortfolioRepository $repository
     */
    public function __construct(PortfolioRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function run(array $data)
    {
        try {
            $portfolio = $this->repository->create($data);
            return $portfolio;
        } catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
