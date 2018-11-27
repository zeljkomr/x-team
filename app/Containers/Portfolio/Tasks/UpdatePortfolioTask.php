<?php

namespace App\Containers\Portfolio\Tasks;

use App\Containers\Portfolio\Data\Repositories\PortfolioRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

/**
 * Class UpdatePortfolioTask
 * @package App\Containers\Portfolio\Tasks
 */
class UpdatePortfolioTask extends Task
{

    /**
     * @var PortfolioRepository
     */
    protected $repository;

    /**
     * UpdatePortfolioTask constructor.
     * @param PortfolioRepository $repository
     */
    public function __construct(PortfolioRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function run($id, array $data)
    {
        try {
            return $this->repository->update($data, $id);
        } catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
