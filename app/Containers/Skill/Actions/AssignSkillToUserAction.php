<?php

namespace App\Containers\Skill\Actions;

use App\Containers\Skill\UI\API\Requests\AssignSkillRequest;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

class AssignSkillToUserAction extends Action
{
    public function run(AssignSkillRequest $request)
    {
        $data = $request->sanitizeInput([
            'skills',
        ]);

        $skill = Apiato::call('Skill@AssignSkillToUserTask', [$request->user_id, $data]);

        return $skill;
    }
}
