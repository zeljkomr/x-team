<?php

namespace App\Containers\Portfolio\UI\API\Transformers;

use App\Containers\Gallery\UI\API\Transformers\GalleryTransformer;
use App\Containers\Portfolio\Models\Portfolio;
use App\Ship\Parents\Transformers\Transformer;

/**
 * Class PortfolioTransformer
 * @package App\Containers\Portfolio\UI\API\Transformers
 */
class PortfolioTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [
        'gallery'
    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [
    ];

    /**
     * @param Portfolio $entity
     *
     * @return array
     */
    public function transform(Portfolio $entity)
    {
        $response = [
            'object'      => 'Portfolio',
            'id'          => $entity->getHashedKey(),
            'name'        => $entity->name,
            'description' => $entity->description,
            'url'         => $entity->url,
            'scale'       => $entity->scale,
            'created_at'  => $entity->created_at,
            'updated_at'  => $entity->updated_at,

        ];

        $response = $this->ifAdmin([
            'real_id' => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }

    /**
     * @param Portfolio $portfolio
     * @return \League\Fractal\Resource\Item
     */
    public function includeGallery(Portfolio $portfolio)
    {
        if ($portfolio->gallery) {
            return $this->item($portfolio->gallery, new GalleryTransformer());
        }
    }
}
