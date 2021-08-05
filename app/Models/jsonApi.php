<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jsonApi extends Model
{
    use HasFactory;

    protected $hidden = [
        'UID',
        'xapikey',
        'status',
    ];
}
