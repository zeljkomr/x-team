<?php

namespace App\Containers\Rate\Models;

use App\Ship\Parents\Models\Model;
use App\Ship\Traits\BootTrait;

/**
 * Class Rate
 * @package App\Containers\Rate\Models
 */
class Rate extends Model
{


    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'hourly_rate',
        'minimum_hour',
        'rate_comment',
    ];

    /**
     * @var array
     */
    protected $attributes = [

    ];

    /**
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * @var array
     */
    protected $casts = [

    ];

    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'rates';
}
