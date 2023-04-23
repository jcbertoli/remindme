<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webhook extends Model
{
    use HasFactory;

    protected $fillable = [
        'identifier',
        'user_id',
        'webhook_id',
        'token',
    ];

    protected $hidden = [
        'token'
    ];
}
