<?php

namespace App\Containers\File\Tasks;

use App\Containers\File\Data\Repositories\FileRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

/**
 * Class DeleteFileTask
 * @package App\Containers\File\Tasks
 */
class DeleteFileTask extends Task
{

    /**
     * @var FileRepository
     */
    protected $repository;

    /**
     * DeleteFileTask constructor.
     * @param FileRepository $repository
     */
    public function __construct(FileRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $id
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
