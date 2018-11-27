<?php

namespace App\Containers\Skill\UI\API\Transformers;

use App\Containers\Skill\Models\Skill;
use App\Ship\Parents\Transformers\Transformer;

class SkillTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    /**
     * @param Skill $entity
     *
     * @return array
     */
    public function transform(Skill $entity)
    {
        $response = [
            'object'     => 'Skill',
            'id'         => $entity->getHashedKey(),
            'name'       => $entity->name,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,

        ];

        if ($entity->pivot) {{
            $response['info'] = [
                'scale'      => $entity->pivot ? $entity->pivot->scale : null,
                'comment'    => $entity->pivot ? $entity->pivot->comment : null,
                'started_at' => $entity->pivot ? $entity->pivot->started_at : null,
            ];
        }}

        $response = $this->ifAdmin([
            'real_id' => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
}
