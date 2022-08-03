<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "category";
    const CREATED_AT = 'created_on';
    const UPDATED_AT = 'updated_on';

    protected $fillable = [
        'id',
        'id_user',
        'id_parent',
        'title',
        'description',
        'price',
        'is_active',
    ];
}
