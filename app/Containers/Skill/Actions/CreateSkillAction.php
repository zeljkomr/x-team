<?php

namespace App\Containers\Skill\Actions;

use App\Containers\Skill\Models\Skill;
use App\Containers\Skill\UI\API\Requests\CreateSkillRequest;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class CreateSkillAction
 * @package App\Containers\Skill\Actions
 */
class CreateSkillAction extends Action
{
    /**
     * @param CreateSkillRequest $request
     * @return mixed
     */
    public function run(CreateSkillRequest $request)
    {
        $data = $request->sanitizeInput([
            'name',
            'scale',
            'comment',
            'started_at',
        ]);

        $skill = Skill::where('name', $data['name'])->first();

        if ($skill) {
            $data['skill_id'] = $skill->id;
            $info = Apiato::call('Skill@AssignSkillToUserTask', [auth()->user()->id, $data]);
            return $info;
        }

        $info = Apiato::call('Skill@CreateSkillTask', [['name' => $data['name']]]);
        $data['skill_id'] = $info->id;
        Apiato::call('Skill@AssignSkillToUserTask', [auth()->user()->id, $data]);

        return $info;
    }
}
