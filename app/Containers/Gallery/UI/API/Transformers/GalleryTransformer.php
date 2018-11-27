<?php

namespace App\Containers\Gallery\UI\API\Transformers;

use App\Containers\File\Models\File;
use App\Containers\File\UI\API\Transformers\FileTransformer;
use App\Containers\Gallery\Models\Gallery;
use App\Ship\Parents\Transformers\Transformer;

/**
 * Class GalleryTransformer
 * @package App\Containers\Gallery\UI\API\Transformers
 */
class GalleryTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [
        'file'
    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [
        'file'
    ];

    /**
     * @param Gallery $entity
     *
     * @return array
     */
    public function transform(Gallery $entity)
    {
        $response = [
            'object'      => 'Gallery',
            'id'          => $entity->getHashedKey(),
            'name'        => $entity->name,
            'description' => $entity->description,
            'created_at'  => $entity->created_at,
            'updated_at'  => $entity->updated_at,
        ];

        $response = $this->ifAdmin([
            'real_id' => $entity->id,
        ], $response);

        return $response;
    }

    /**
     * @param Gallery $file
     * @return \League\Fractal\Resource\Collection
     */
    public function includeFile(Gallery $file)
    {
        if ($file->files) {
            return $this->collection($file->files, new FileTransformer());
        }
    }
}
