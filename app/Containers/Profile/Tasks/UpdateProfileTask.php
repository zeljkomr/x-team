<?php

namespace App\Containers\Profile\Tasks;

use App\Containers\Profile\Data\Repositories\ProfileRepository;
use App\Ship\Criterias\Eloquent\IncludesCriteria;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateProfileTask extends Task
{

    protected $repository;

    public function __construct(ProfileRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            $profile = $this->repository->update($data, $id);

            return $profile;
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }

    public function includes()
    {
        return $this->repository->pushCriteria(new IncludesCriteria());
    }
}
