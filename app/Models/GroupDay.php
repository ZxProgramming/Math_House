<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupDay extends Model
{
    use HasFactory;

    protected $fillable = [
        'day',
        'from',
        'to',
        'group_id',
    ];
}
