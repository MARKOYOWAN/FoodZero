<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model {
    protected $table = "media";
    
    protected $fillable = [
        'id_users',
        'id_category',
        'id_menu',
        'path',
    ];
}