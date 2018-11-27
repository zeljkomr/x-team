<?php

namespace App\Containers\Portfolio\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class PortfolioRepository
 */
class PortfolioRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
