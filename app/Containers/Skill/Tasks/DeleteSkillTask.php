<?php

namespace App\Containers\Skill\Tasks;

use App\Containers\Skill\Data\Repositories\SkillRepository;
use App\Containers\User\Models\User;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

/**
 * Class DeleteSkillTask
 * @package App\Containers\Skill\Tasks
 */
class DeleteSkillTask extends Task
{

    /**
     * @var SkillRepository
     */
    protected $repository;

    /**
     * DeleteSkillTask constructor.
     * @param SkillRepository $repository
     */
    public function __construct(SkillRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function run(array $data)
    {
        try {
            $user = User::find(auth()->user()->id);

            $user->skills()->detach($data);

            return $user;
        } catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
