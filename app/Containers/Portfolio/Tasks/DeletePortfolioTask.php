<?php

namespace App\Containers\Portfolio\Tasks;

use App\Containers\Portfolio\Data\Repositories\PortfolioRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

/**
 * Class DeletePortfolioTask
 * @package App\Containers\Portfolio\Tasks
 */
class DeletePortfolioTask extends Task
{

    /**
     * @var PortfolioRepository
     */
    protected $repository;

    /**
     * DeletePortfolioTask constructor.
     * @param PortfolioRepository $repository
     */
    public function __construct(PortfolioRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $id
     * @return int
     */
    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        } catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
