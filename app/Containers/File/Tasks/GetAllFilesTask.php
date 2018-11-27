<?php

namespace App\Containers\File\Tasks;

use App\Containers\File\Data\Repositories\FileRepository;
use App\Ship\Parents\Tasks\Task;

/**
 * Class GetAllFilesTask
 * @package App\Containers\File\Tasks
 */
class GetAllFilesTask extends Task
{

    /**
     * @var FileRepository
     */
    protected $repository;

    /**
     * GetAllFilesTask constructor.
     * @param FileRepository $repository
     */
    public function __construct(FileRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return mixed
     */
    public function run()
    {
        return $this->repository->paginate();
    }
}
