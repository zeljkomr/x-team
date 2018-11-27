<?php

namespace App\Containers\Profile\UI\API\Transformers;

use App\Containers\Contact\UI\API\Transformers\ContactTransformer;
use App\Containers\Profile\Models\Profile;
use App\Containers\User\UI\API\Transformers\WebPresenceTransformer;
use App\Ship\Parents\Transformers\Transformer;

class ProfileTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [
        'contacts'
    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    /**
     * @param Profile $entity
     *
     * @return array
     */
    public function transform(Profile $entity)
    {
        $response = [
            'object'             => 'Profile',
            'id'                 => $entity->getHashedKey(),
            'description'        => $entity->description,
            'title'              => $entity->title,
            'created_at'         => $entity->created_at,
            'updated_at'         => $entity->updated_at,
        ];

        $response = $this->ifAdmin([
            'real_id' => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }

    public function includeContacts(Profile $profile)
    {
        if ($profile->contacts) {
            return $this->collection($profile->contacts, new ContactTransformer());
        }
    }
}
