<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jsonApi extends Model
{
    use HasFactory;
    
    protected $table = 'json_apis';

    protected $hidden = [
        'UID',
        'xapikey',
        'status',
    ];

    protected $fillable = [
        'UID',
        'xapikey',
        'userName',
        'userSurname',
        'userEmail',
        'userPhone',
    ];
}
