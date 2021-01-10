<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class Category extends Model
{
    use HasFactory;

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::saving(function ($user) {
            $user->slug = Str::slug($user->name);

            Validator::make($user->attributes, [
                'name' => 'required|max:20',
                'slug' => 'required|max:20',
            ])->validate();

            return $user;
        });
    }
}
