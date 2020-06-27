<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'parent_id', 'name', 'description', 'image_src'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

}
