<?php

namespace App\Containers\Contact\Tasks;

use App\Containers\Contact\Data\Repositories\ContactRepository;
use App\Ship\Criterias\Eloquent\IncludesCriteria;
use App\Ship\Parents\Tasks\Task;

/**
 * Class GetAllContactsTask
 * @package App\Containers\Contact\Tasks
 */
class GetAllContactsTask extends Task
{

    /**
     * @var ContactRepository
     */
    protected $repository;

    /**
     * GetAllContactsTask constructor.
     * @param ContactRepository $repository
     */
    public function __construct(ContactRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return mixed
     */
    public function run()
    {
        if (auth()->user()->profile) {
            return $this->repository->findWhere(['profile_id' => auth()->user()->profile->id]);
        }
        return null;
    }

    /**
     * @return ContactRepository
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function includes()
    {
        return $this->repository->pushCriteria(new IncludesCriteria());
    }
}
