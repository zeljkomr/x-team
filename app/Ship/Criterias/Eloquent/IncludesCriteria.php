<?php

namespace App\Ship\Criterias\Eloquent;

use App\Ship\Parents\Criterias\Criteria;
use Illuminate\Support\Facades\Input;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Class IncludesCriteria
 *
 * @package App\Containers\User\Data\Criterias
 */
class IncludesCriteria extends Criteria
{

    /**
     * @param                            $model
     * @param PrettusRepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, PrettusRepositoryInterface $repository)
    {
        if (!Input::get('include')) {
            return $model;
        }

        $includes = explode(',', Input::get('include'));
        foreach ($includes as $key => $method) {
            if (!method_exists($model, $method)) {
                unset($includes[$key]);
            }
        }
        return $model->with($includes);
    }
}