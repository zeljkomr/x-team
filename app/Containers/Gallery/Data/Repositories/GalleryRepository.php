<?php

namespace App\Containers\Gallery\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class GalleryRepository
 */
class GalleryRepository extends Repository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
    ];
}
