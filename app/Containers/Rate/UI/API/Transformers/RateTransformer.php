<?php

namespace App\Containers\Rate\UI\API\Transformers;

use App\Containers\Rate\Models\Rate;
use App\Ship\Parents\Transformers\Transformer;

class RateTransformer extends Transformer
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
     * @param Rate $entity
     *
     * @return array
     */
    public function transform(Rate $entity)
    {
        $response = [
            'object'       => 'Rate',
            'id'           => $entity->getHashedKey(),
            'hourly_rate'  => $entity->hourly_rate,
            'minimum_hour' => $entity->minimum_hour,
            'rate_comment' => $entity->rate_comment,
            'created_at'   => $entity->created_at,
            'updated_at'   => $entity->updated_at,

        ];

        $response = $this->ifAdmin([
            'real_id' => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
}
