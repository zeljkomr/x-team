<?php

namespace App\Containers\Authentication\Tasks;

use App\Containers\User\Data\Repositories\UserRepository;
use App\Ship\Criterias\Eloquent\IncludesCriteria;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\Auth;

/**
 * Class GetAuthenticatedUserTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class GetAuthenticatedUserTask extends Task
{

    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * GetAuthenticatedUserTask constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return  \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function run()
    {
        return Auth::user();
    }

    /**
     * @return UserRepository
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function includes()
    {
        return $this->repository->pushCriteria(new IncludesCriteria());
    }

}
