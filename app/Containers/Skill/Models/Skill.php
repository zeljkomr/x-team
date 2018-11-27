<?php

namespace App\Containers\Skill\Models;

use App\Ship\Parents\Models\Model;
use App\Ship\Traits\BootTrait;

class Skill extends Model
{


    protected $fillable = [
        'name'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'skills';
}
