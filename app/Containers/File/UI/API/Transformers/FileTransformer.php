<?php

namespace App\Containers\File\UI\API\Transformers;

use App\Containers\File\Models\File;
use App\Ship\Parents\Transformers\Transformer;

/**
 * Class FileTransformer
 * @package App\Containers\File\UI\API\Transformers
 */
class FileTransformer extends Transformer
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
     * @param File $entity
     *
     * @return array
     */
    public function transform(File $entity)
    {
        $response = [
            'object'      => 'File',
            'id'          => $entity->getHashedKey(),
            'path'        => $entity->path,
            'description' => $entity->description,
            'created_at'  => $entity->created_at,
            'updated_at'  => $entity->updated_at,

        ];

        $response = $this->ifAdmin([
            'real_id' => $entity->id,
        ], $response);

        return $response;
    }
}
