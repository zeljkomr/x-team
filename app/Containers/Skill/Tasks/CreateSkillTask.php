<?php

namespace App\Containers\Skill\Tasks;

use App\Containers\Skill\Data\Repositories\SkillRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

/**
 * Class CreateSkillTask
 * @package App\Containers\Skill\Tasks
 */
class CreateSkillTask extends Task
{

    /**
     * @var SkillRepository
     */
    protected $repository;

    /**
     * CreateSkillTask constructor.
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
            return $this->repository->create($data);
        } catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
