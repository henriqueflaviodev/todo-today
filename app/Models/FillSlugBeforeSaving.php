<?php

namespace App\Models;

use Illuminate\Support\Str;

trait FillSlugBeforeSaving {

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    //TODO - Verify transformation data
    protected static function booted()
    {
        static::saving(function ($model) {
            $model->slug = Str::slug($model->name);
            return $model;
        });
    }
}
