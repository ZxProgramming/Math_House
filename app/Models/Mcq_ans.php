<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mcq_ans extends Model
{
    use HasFactory;

    protected $fillable = [
        'mcq_ans',
        'mcq_answers',
        'q_id',
    ];
}
