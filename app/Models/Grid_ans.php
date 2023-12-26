<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grid_ans extends Model
{
    use HasFactory;

    protected $fillable = [
        'grid_ans',
        'q_id',
    ];
}
