<?php

namespace App\Containers\File\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class FileRepository
 */
class FileRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
    ];

}
