<?php

namespace App\Containers\Rate\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class RateRepository
 */
class RateRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
