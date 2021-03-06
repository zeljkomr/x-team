<?php

namespace App\Containers\Skill\Tasks;

use App\Containers\Skill\Data\Repositories\SkillRepository;
use App\Containers\User\Models\User;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

/**
 * Class AssignSkillToUserTask
 * @package App\Containers\Skill\Tasks
 */
class AssignSkillToUserTask extends Task
{

    /**
     * @var SkillRepository
     */
    protected $repository;

    /**
     * AssignSkillToUserTask constructor.
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
            if (isset($data['skills'])) {
                foreach ($data['skills'] as $skill) {
                    $user->skills()->attach($skill['skill_id'], [
                        'scale'      => $skill['scale'],
                        'comment'    => $skill['comment'],
                        'started_at' => $skill['started_at'],
                    ]);
                }
            } else {
                $user->skills()->attach($data['skill_id'], [
                    'scale'      => $data['scale'],
                    'comment'    => $data['comment'],
                    'started_at' => $data['started_at'],
                ]);
            }
            $userData = User::where('id', $user_id)->with('skills')->first();
            return $userData->skills;
        } catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
