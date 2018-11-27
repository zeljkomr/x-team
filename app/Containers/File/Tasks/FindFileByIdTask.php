<?php

namespace App\Containers\File\Tasks;

use App\Containers\File\Data\Repositories\FileRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

/**
 * Class FindFileByIdTask
 * @package App\Containers\File\Tasks
 */
class FindFileByIdTask extends Task
{

    /**
     * @var FileRepository
     */
    protected $repository;

    /**
     * FindFileByIdTask constructor.
     * @param FileRepository $repository
     */
    public function __construct(FileRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $id
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
