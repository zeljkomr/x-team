<?php

namespace App\Containers\Profile\Models;

use App\Containers\Contact\Models\Contact;
use App\Ship\Parents\Models\Model;
use App\Ship\Traits\BootTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Profile
 * @package App\Containers\Profile\Models
 */
class Profile extends Model
{
    use SoftDeletes;


    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'description',
        'title',
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
    protected $resourceKey = 'profiles';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts()
    {
        return $this->hasMany(Contact::class, 'profile_id');
    }
}
