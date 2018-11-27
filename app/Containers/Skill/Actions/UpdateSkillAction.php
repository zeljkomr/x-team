<?php

namespace App\Containers\Skill\Actions;

use App\Containers\Skill\UI\API\Requests\UpdateSkillRequest;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class UpdateSkillAction
 * @package App\Containers\Skill\Actions
 */
class UpdateSkillAction extends Action
{
    /**
     * @param UpdateSkillRequest $request
     * @return mixed
     */
    public function run(UpdateSkillRequest $request)
    {
        $data = $request->sanitizeInput([
            'skill_id',
            'scale',
            'comment',
            'started_at',
        ]);

        $skill = Apiato::call('Skill@UpdateSkillTask', [auth()->user()->id, $data]);

        return $skill;
    }
}
