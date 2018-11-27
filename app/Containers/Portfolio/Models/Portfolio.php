<?php

namespace App\Containers\Portfolio\Models;

use App\Containers\Gallery\Models\Gallery;
use App\Ship\Parents\Models\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'name',
        'description',
        'url',
        'scale',
        'gallery_id',
        'user_id'
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
//    protected $resourceKey = 'portfolios';

    public function gallery()
    {
        return $this->belongsTo(Gallery::class, 'gallery_id', 'id');
    }
}
