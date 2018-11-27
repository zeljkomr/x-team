<?php

namespace App\Containers\Skill\Tasks;

use App\Containers\Skill\Data\Repositories\SkillRepository;
use App\Containers\User\Models\User;
use App\Ship\Exceptions\UpdateProfileFieldException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

/**
 * Class UpdateSkillTask
 * @package App\Containers\Skill\Tasks
 */
class UpdateSkillTask extends Task
{

    /**
     * @var SkillRepository
     */
    protected $repository;

    /**
     * UpdateSkillTask constructor.
     * @param SkillRepository $repository
     */
    public function __construct(SkillRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $user_id
     * @param array $data
     * @return mixed
     */
    public function run($user_id, array $data)
    {
        try {
            $user = User::where('id', $user_id)->with('skills')->first();

            $user->skills()->where('skill_id', $data['skill_id'])->updateExistingPivot($data['skill_id'], [
                'scale'      => $data['scale'],
                'comment'    => $data['comment'],
                'started_at' => $data['started_at'],
            ]);

            $userData = User::where('id', $user_id)->with('skills')->first();
            $info = $userData->skills()->where('skill_id', $data['skill_id'])->first();
            if ($info) {
                return $info;
            }
            throw new UpdateResourceFailedException();
        } catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
