<?php

namespace App\Ship\Traits;

use Webpatser\Uuid\Uuid;

trait BootTrait
{
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string)Uuid::generate(4);
        });
    }
}