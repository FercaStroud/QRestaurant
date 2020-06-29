<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table = 'categories';
    public $timestamps = true;

    protected $primaryKey = 'id';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'user_id', 'parent_id', 'name', 'description', 'image_src'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

}
