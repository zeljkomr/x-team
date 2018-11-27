<?php

namespace App\Containers\Contact\UI\API\Transformers;

use App\Containers\Contact\Models\Contact;
use App\Ship\Parents\Transformers\Transformer;

class ContactTransformer extends Transformer
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
     * @param Contact $entity
     *
     * @return array
     */
    public function transform(Contact $entity)
    {
        $response = [
            'object'     => 'Contact',
            'id'         => $entity->getHashedKey(),
            'contact'    => $entity->contact,
            'type'       => $entity->type,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,

        ];

        $response = $this->ifAdmin([
            'real_id' => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
}
