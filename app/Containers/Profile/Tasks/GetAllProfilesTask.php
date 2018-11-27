<?php

namespace App\Containers\Profile\Tasks;

use App\Containers\Profile\Data\Repositories\ProfileRepository;
use App\Ship\Criterias\Eloquent\IncludesCriteria;
use App\Ship\Parents\Tasks\Task;

/**
 * Class GetAllProfilesTask
 * @package App\Containers\Profile\Tasks
 */
class GetAllProfilesTask extends Task
{

    /**
     * @var ProfileRepository
     */
    protected $repository;

    /**
     * GetAllProfilesTask constructor.
     * @param ProfileRepository $repository
     */
    public function __construct(ProfileRepository $repository)
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

    /**
     * @return ProfileRepository
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function includes()
    {
        return $this->repository->pushCriteria(new IncludesCriteria());
    }
}
