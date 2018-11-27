<?php

namespace App\Containers\Authorization\Models;

use Apiato\Core\Traits\HashIdTrait;
use Apiato\Core\Traits\HasResourceKeyTrait;
use App\Ship\Traits\BootTrait;
use Spatie\Permission\Models\Role as SpatieRole;
use Webpatser\Uuid\Uuid;

/**
 * Class Role
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class Role extends SpatieRole
{

    const FREELANCER = 'freelancer';
    const CUSTOMER = 'customer';
    const PROJECT_MANGER = 'project-manger';
    const CEO = 'ceo';
    const ADMIN = 'admin';
    const ALL = 'freelancer|customer|project-manager|ceo|admin';

    use HashIdTrait;

    use HasResourceKeyTrait;

    protected $guard_name = 'web';

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'guard_name',
        'display_name',
        'description',
        'level',
    ];
}
