<?php

namespace App\Containers\File\Models;

use App\Containers\Gallery\Models\Gallery;
use App\Containers\Promotion\Models\Promotion;
use App\Ship\Parents\Models\Model;

/**
 * Class File
 * @package App\Containers\File\Models
 */
class File extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'path',
        'description'
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
    protected $resourceKey = 'files';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function files()
    {
        return $this->belongsToMany(Gallery::class, 'gallery_file');
    }
}
