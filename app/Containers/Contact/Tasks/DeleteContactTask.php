<?php

namespace App\Containers\Contact\Tasks;

use App\Containers\Contact\Data\Repositories\ContactRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

/**
 * Class DeleteContactTask
 * @package App\Containers\Contact\Tasks
 */
class DeleteContactTask extends Task
{

    /**
     * @var ContactRepository
     */
    protected $repository;

    /**
     * DeleteContactTask constructor.
     * @param ContactRepository $repository
     */
    public function __construct(ContactRepository $repository)
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
