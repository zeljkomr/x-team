<?php

namespace App\Containers\File\Tasks;

use App\Containers\File\Data\Repositories\FileRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

/**
 * Class UpdateFileTask
 * @package App\Containers\File\Tasks
 */
class UpdateFileTask extends Task
{

    /**
     * @var FileRepository
     */
    protected $repository;

    /**
     * UpdateFileTask constructor.
     * @param FileRepository $repository
     */
    public function __construct(FileRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $id
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
