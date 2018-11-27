<?php

namespace App\Containers\User\Tasks;

use App\Containers\User\Data\Repositories\UserRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateCurrencyTask extends Task
{

    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($data)
    {
        try {
            return $this->repository->update([
                'currency' => $data
            ], auth()->user()->id);
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
